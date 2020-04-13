<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use PDF;
use Auth;
use DB;
use App\shop;
use App;
use App\Item;
use App\Sentnewsletter;
use \App\Order;
use \App\Sales;
use Session;
use App\attend;
use App\Payout;
use App\PayoutHistory;
use App\Expense;
use App\Contribution;
class PrintController extends Controller
{
   public function print_stockStats_pdf(){
       $stock = DB::table('items')
           ->join('item_types','items.item_type_id','=','item_types.category_id')->
           select('items.*','category_name','item_types.unit_price as unit_price','description')
           ->get();
       $content = view('purchase.stockformpdf',compact('stock'));
       /*$pdf = App::make('dompdf');*/
       $pdf = PDF::loadHTML($content,'A4','portrait')->download('GEEK Current Stock Statistics.pdf');
       return $pdf;
   }
    public function downloadContributions(){

        if(Session::has('contributor_id_to_download')){
            $id =Session::get('contributor_id_to_download');
            $users = Contribution::getAllContributionsByUserID($id);
            Session::forget('contributor_id_to_download');
        }
        elseif(Session::has('contributor_batch_to_download'))
         {
            $batch =  Session::get('contributor_batch_to_download');
             $users =  Contribution::getAllContributionsByBatchForDownload($batch);
             Session::forget('contributor_batch_to_download');
         }
        else{
           $users = Contribution::getLimitedContributors(2000);
        }

       $content = view('alumni.ContributionsTopdf')->with('users',$users)->render();
       /*$pdf = App::make('dompdf');*/
       $pdf = PDF::loadHTML($content,'A4','portrait')->download(Carbon::now().'LYBEXSA Contribution List.pdf');
       return $pdf;
   }
    public function downloadExpenseForProject($project_id){
        $expenses = DB::table('expenses')
            ->join('users','expenses.user_id','=','users.user_id')
            ->join('projects','expenses.project_id','=','projects.project_id')
            ->select('expenses.*','users.*','projects.project_name','projects.awarded_cost','users.user_id','users.first_name',
                'last_name','projects.amount_received')->where('expenses.project_id','=',$project_id)
            ->orderBy('expenses.created_at','desc')
            ->limit(100)->get();

        $content = view('expenses.expenseHistory_pdf',compact('expenses'));
       /*$pdf = App::make('dompdf');*/
       $pdf = PDF::loadHTML($content,'A4','portrait')->download('Summary of Project Expenses.pdf');
       return $pdf;
   }
    public function downloadProjectExpensesHistoryPdf(){
       // $expenses = Expense::getExpensesByProject();
        $expenses = Expense::getExpenses();

       $content = view('expenses.expenseHistory_pdf',compact('expenses'));
       /*$pdf = App::make('dompdf');*/
       $pdf = PDF::loadHTML($content,'A4','portrait')->download('Project Expenses history.pdf');
       return $pdf;
   }
    public function downloadMaterialSalesHistoryPdf(){
        $sales_details = DB::table('sales')
            ->join('items','items.item_id','=','sales.item_id')
            ->join('item_types','items.item_type_id','=','category_id')
            ->join('users','users.user_id','=','sales.user_id')
            ->groupBy('receipt_no')
            ->orderBy('receipt_no','desc')
            ->select(DB::raw('sale_id,sales.item_id,count(receipt_no) as articles,sum(totalcost) as totalcost,customer_details
            ,sales.user_id as user_id,first_name,last_name,date_sold,receipt_no,category_name,unit_price'))
            ->limit(200)->get();
       $content = view('sales.saleshistory_pdf',compact('sales_details'));
       /*$pdf = App::make('dompdf');*/
       $pdf = PDF::loadHTML($content,'A4','portrait')->download('GEEK Material Sales history.pdf');
       return $pdf;
   }
    public function downloadProductPurchaseHistory_pdf(){
        $history = DB::table('purchases')
            ->join('users','users.user_id','=','purchases.user_id')
            ->join('item_types','item_type_id','=','category_id')
            ->join('roles','roles.role_id','=','users.role_id')
            ->select('purchases.*','first_name','last_name','roles.name','category_name','description','unit_price')
            ->orderBy('created_at',"desc")
            ->limit(500)->get();
       $content = view('purchase.history_as_pdf',compact('history'));
       /*$pdf = App::make('dompdf');*/
       $pdf = PDF::loadHTML($content,'A4','portrait')->download('GEEK Material Purchase History.pdf');
       return $pdf;
   }
    public static function downloadPricechangeHistoryPdf(){
        $history = \App\ItemPriceChange::getPriceChange();
        $content=view('category/pricechangepdf',compact('history'))->render();
        $pdf = PDF::loadHTML($content,'A4','portrait')->download( trans('english.geek'). "Price Change History".Carbon::today().'.pdf');
        return $pdf;
    }
   public function downloadAttendanceHistory(){

       if((Session::has('start_date'))){
           $start = Session::get("start_date");
            Session::forget("start_date");
            if(Session::has('stop_date')){
                $stop  = Session::get("stop_date");
                Session::forget("stop_date");
            }
            else{
                $stop = Carbon::today()->toDateString();
            }
            $users = attend::getAttendanceHistoryForPeriod($start,$stop);
        }
       else{
           $users = attend::todayAttendance();
       }
       $content = view('user/attendancehistoreypdf',compact('users'))->render();
       /*$pdf = App::make('dompdf');*/
       $pdf = PDF::loadHTML($content,'A4','portrait')->download('Attendance_history.pdf');
       return $pdf;
   }


    public function printWageHistoryForDay($p_id){
           $project_id = $p_id;

        if(Session::has('wagePayoutSetHistoryDate')){

            $date = Session::get('wagePayoutSetHistoryDate');
        }
        else{
            $date = Carbon::now();
        }
        $date1 = Carbon::createFromFormat('Y-m-d', $date)->toDateString();


        $user_ids = DB::table('salaried_worker')
            ->select('user_id')->groupBy('user_id')->lists('user_id');// selects salaried workers ids only
        $wagehistory = DB::table('payout')->join('users','users.user_id','=','payout.reciever_id')
            ->select('payout.*','users.user_id','users.first_name','users.last_name')->whereNotIn('payout.reciever_id',$user_ids)->whereDate('payout.created_at','=',$date1)
            ->where('payout.project_id',$project_id)->get(); //retrieve wage workers payment for the day specified
        $table ='';
        if(count($wagehistory)>0){
            $project = App\Project::where('project_id','=',$project_id)->first();
            $table .= '<div class= "row"><h3 style="text-align: center;">'.$project->project_name.'</h3>';
            $counter = 0;
            foreach($wagehistory as $user){
                $counter ++;
                if($counter == 1){
                    $table  .= '<table   class="table table-bordered table-striped"style="border-collapse:collapse;" border="1px"><thead>
                        <tr style="background-color: #0088CC"><th style="width: 2%;">'.trans('english.id').'</th>
                            <th style="width: 25%;">'.trans('english.user_name').'</th><th style="width: 5%;">'
                        .trans('english.days').'</th><th style="width: 15%;">'.trans('english.total_amount').'</th>
                            <th style="width: 20%;">'.trans('english.salary_paid').'</th><th style="width: 10%;">'.trans('english.owed').'</th><th style="width: 10%;">'.
                        trans('english.payment_date').'</th><th style="width: 13%;">'.trans('english.signature').'</th></tr></thead>
                        <tbody>';
                }
                $table .='<tr style="width: 100%;"><td style="width: 2%;"  >'. $counter.'</td>
            <td style="width: 25%;">' .$user->first_name ." ".$user->last_name.'</td><td style="width: 5%;">'.$user->days_worked.
                    '</td><td style="width: 15%;">';
                $total = $user->overtime_pay + $user->regular_pay;
                $table .= $total.'</td><td style="width: 20%;">'.$user->amount_paid.'</td><td style="width: 10%;">'.$user->amount_owed.'</td><td style="width: 10%;">'.
                    $user->created_at.'</td><td style="width:13%;">'."                        ".' </td></tr>';

            }
            $table .= '</tbody><tfoot><tr style="background-color: #c0c0c0" ><td colspan="3">'.trans('english.total_entries').'</td><td colspan="5">'.
                $counter .'</td></tr></tfoot></table>';

        }

        $content =$table;
        /*$pdf = App::make('dompdf');*/
        $pdf = PDF::loadHTML($content,'A4','portrait')->download('wages_payment_history.pdf');
        return $pdf;
    }

















    public function downloadPayoutHistory(){

       if((Session::has('payout_history_start_date'))){
           $start = Session::get("payout_history_start_date");
            Session::forget("payout_history_start_date");
            if(Session::has('payout_history_stop_date')){
                $stop  = Session::get("payout_history_stop_date");
                Session::forget("payout_history_stop_date");

            }
            else{
                $stop = Carbon::today()->toDateString();

            }
            if(isset($start) && isset($stop)){
            $payout = PayoutHistory::getPayoutForPeriod($start,$stop);
            }else{
                $payout = PayoutHistory::getPayoutForThreeMonths();
            }

        }
       else{

           $payout = PayoutHistory::getPayoutForThreeMonths();
       }
        $payers = PayoutHistory::getSalaryPayers();

       $content = view('salary.payouthistorypdf',compact('payout','payers'))->render();
        /*$pdf = App::make('dompdf');*/
        $pdf = PDF::loadHTML($content,'A4','portrait')->download('salary payout_history'.Carbon::now().".pdf");

        return $pdf;
   }

    /** prints summary of sent newsletters in pdf
     * @return mixed
     */
    public function print_newsletters(){
        $sentletters = DB::table('sentnewsletters')
            ->join('users', 'users.user_id', '=', 'sentnewsletters.user_id')
            ->select('users.user_id','users.first_name','users.last_name', 'sentnewsletters.*')
            ->get();
       $content = view('newsletter/sentletterspdf',compact('sentletters'));
       /*$pdf = App::make('dompdf');*/
       $pdf = PDF::loadHTML($content,'A4','portrait')->download('sent_newsletters_summary.pdf');
       return $pdf;
   }

    public function print_orderSummary(){
        $sales_details = App\Order::getordersFromOwnedShops();
       $content = view('orders.orderstatisticspdf',compact('sales_details'));
       /*$pdf = App::make('dompdf');*/
       $pdf = PDF::loadHTML($content,'A4','portrait')->download('order_summary.pdf');
       return $pdf;
   }
    public function printOrderByID($id){
        $order = Order::where('delivery_status',0)->where('order_id',$id)->first();
        $orderDetails = Sales::where('order_id',$order->order_id)->get();

       $content = view('orders.downloadorderPDF',compact('order','orderDetails'));
       /*$pdf = App::make('dompdf');*/
       $pdf = PDF::loadHTML($content,'A4','portrait')->download('purchaseInvoice.pdf');
       return $pdf;
   }
}
