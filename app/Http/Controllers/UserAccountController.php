<?php

namespace App\Http\Controllers;

use App\AlumniMember;
use App\attend;
use App\Contribution;
use App\Message;
use App\PayoutHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use App\User;
use Mail;
use Input;
use Auth;
use \App\Item;
use DB;
use \App\Contact;
use Session;
use Redirect;
use \App\Momo;
use \App\Payment;
use \App\Order;
use \App\Patient;
use File;
use Image;
use \App\UserWorksOnProject;
use Validator;
use \App\SalariedWorker;
use \App\Overtime;
use \App\Payout;
use URL;
class UserAccountController extends Controller
{
    use CheckAllowedPrivileges; // this is trait whose methods are used by this class 'except'=>,'except'=>

    public function __construct(){
        $this->middleware('user',['except'=>["getBarChartData","changeLanguage","filterContributorsBybatchAnyMember","getUserAndContributionsByAnyMember","filterContributorsByUserID","filterContributorsBybatch","filterContributorsBybatchRedirect"]
            ]);

    }

    /**
* Display a listing of the resource.
*
     * @return \Illuminate\Http\Response
     * show form signup form for new account
     */

    public function getBarChartData(){
      //pull data from db here
      $critical = DB::table('patient_records')->select('*')->where("state","critical")->get();
      $stable= DB::table('patient_records')->select('*')->where("state","stable")->get();
      $healed= DB::table('patient_records')->select('*')->where("state","healed")->get();
      $died= DB::table('patient_records')->select('*')->where("state","di")->get();
      $all = DB::table('patient_records')->select('*')->get();
      $data = [count($critical),count($stable),count($healed),count($died),count($all)];
      $labels = ['Critical','Stable','Healed','Died','Total'];
      return response()->json(compact('labels', 'data'));

    }
    public function register()
    {

         return view('account.register');
    }
    public function registerPatient()
    {

         return view('account.registerpatient');
    }
    public function savePatientDetails(Request $request)
    {

        $name ="";
        if($request->hasFile('profilePicFile')) {
            $file = Input::file('profilePicFile');
            $name = $request->phone.'-'.$file->getClientOriginalName();
            $name= str_replace(" ","",$name);
            //$user->picture = $name;
            $path=public_path('image/alumni/members');
            $path_with_file=public_path('image/alumni/members/'.$name);

            if(!File::exists($path)){
                File::makeDirectory($path,0777,true);
            }
            if(is_writable($path)){

            };
            Image::make($file->getRealPath())->resize(200, 150)->save($path_with_file);

            //$file->move(public_path().'/images/'.$product->category.'/', $name);
        }

        $id = DB::table('users')->InsertGetId(array('picture'=>$name,'Email'=>$request->input('email'),
            'FirstName'=>$request->input('first_name'),'LastName'=>$request->input('last_name'),
            'Phone'=>$request->input('phone'),'Address'=>$request->input('address'),'Location'=>$request->input('batch'),
            'role_id'=>$request->input('role_id'))  );

        //User::create($request->all());
        \Session::flash('success',trans('english.account_creation_success'));
        return Redirect::back();
        //return $input;
    }
    public function resetPassword()
    {
        return ('implement:useraccountController@resetPassword');
    }

    public function updateProfile($id)
    {
         $user =AlumniMember::getUserProfileToUpdate($id);
        return view('account.updateprofile',compact("user"));
    }

    public function saveUserUpdate(Request $request)
    {

        $this->validate($request,
            ['first_name'=>'required','last_name'=>'required','profilePicFile',"email", "address","role_id"]
        );
        $user_id = $request->user_id;
        $shop = AlumniMember::findOrFail($user_id);
        $shop->first_name = $request->get('first_name');
        $shop->last_name = $request->get('last_name');
        $shop->email = $request->get('email');
        $shop->address = $request->get('address');
        $shop->phone = $request->get('phone');
        $shop->role_id = $request->get('role_id');
        $shop->batch = $request->get('batch');
        if ($request->hasFile('profilePicFile')) {
            $file = Input::file('profilePicFile');
            $name = $request->phone . '-' . $file->getClientOriginalName();
            $name = str_replace(" ", "", $name);
            $old_image =public_path('image/alumni/mambers/'.$shop->picture);
            if(File::exists($old_image)){
                unlink($old_image); //delete old image
            }

            $shop->picture = $name;
            $path = public_path('image/alumni/members');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true);

            }
            $path_with_file = public_path('image/alumni/members/' . $name);
            Image::make($file->getRealPath())->resize(130, 130)->save($path_with_file);
            $file->move(public_path() . '/image/alumni/members/', $name);
        }

        $shop->update();
        \Session::flash('success',trans('english.user_updated'));
        $user=AlumniMember::getUserProfileToUpdate($request->user_id);
        return view("account.updateprofile",compact('user'));
    }
    /*
     * this method returns attendace history for an interval
     */
    public function getUserAndContributions() {
        if(Session::has('contributor_id_to_download')){
            Session::forget('contributor_id_to_download');
        }
        if(Session::has('contributor_batch_to_download')){
            Session::forget('contributor_batch_to_download');
        }

        return view('alumni.viewContributions');

    }
    public function getUserAndContributionsByAnyMember() {
        if(Session::has('contributor_id_to_download')){
            Session::forget('contributor_id_to_download');
        }
        if(Session::has('contributor_batch_to_download')){
            Session::forget('contributor_batch_to_download');
        }

        return view('alumni.membersViewContributions');

    }
    public function filterContributorsByUserID($user_id)
    {
        if(Session::has('contributor_id_to_download')){
            Session::forget('contributor_id_to_download');
        }
        if(Session::has('contributor_batch_to_download')){
            Session::forget('contributor_batch_to_download');
        }

        Session::put('contributor_id_to_download',$user_id);//this id will be accessed if user clicks on download button


        $userContr = Contribution::getAllContributionsByUserID($user_id);

         $contr ='<table  class="table table-bordered table-striped"><div><h2 style="text-align: center;">'.trans('english.contributors_list')
                    . '</h2></div><thead><tr style="background-color: #0088CC"><th style="width: 2%;">'.trans('english.id').
                        ' </th><th style="width: 15%;">'. trans('english.user_name').'</th><th style="width: 10%;">'.trans('english.phone') .'</th><th style="width: 10%;">'.trans('english.amount')
                  .'</th> <th style="width: 15%;"> '.  trans('english.purpose') .'</th><th style="width: 10%;">'.  trans('english.reciever')
                   .' </th><th style="width: 10%;">'.  trans('english.edit') .'</th></tr> </thead><tbody>'
                          ;
         $sum =0; $counter =0;
        foreach($userContr as $user){
            $counter ++;
            $contr .='<tr> <td  hidden name="countribution_id">'.$user->contribution_id.'</td><td style="width: 2%;">'.
                $counter .'</td><td style="width: 15%;">' . $user->first_name .' '. $user->last_name.'</td><td style="width: 10%;">'.
                $user->phone  .'</td><td style="width: 10%;">'.$user->amount.' FCFA</td>'.'<td style="width: 15%;">'.$user->purpose.
                '</td><td style="width: 15%;">';
            $receiver = AlumniMember::findOrFail($user->reciever_id);
            $contr .= $receiver->first_name ." ". $receiver->last_name.'</td>
                                <td style="width: 10%;"><a href="'.URL::to('/user/contribution/update/'.$user->contribution_id).'" class="btn btn-success"> <span><i class="fa fa-edit"></i> </span>'
                        .trans('english.edit').'</a></td></tr>';
            $sum += $user->amount *1;
        }

        $contr .='</tbody><tfoot><tr  style="background-color: rgba(93, 156, 94, 0.36)"><th colspan="3">'.trans('english.total_amount').
                '</th><th colspan="4" id="sum">'.  $sum . 'FCFA</th>   </tr><tr style="background-color: #0088CC" ><th colspan="3">'.
               trans('english.total_entries').'</th>  <th colspan="4">1 </th> </tr>  </tfoot> </table>';


        $data =[];
        $data['contributions']= $contr;
         return json_encode($data);
    }
    public function filterContributorsBybatchRedirect(Request $request)
    {
         $batch = $request->get('batch_sort');
        if($batch =="none"){
            \Session::flash('select_msg',trans('english.select_msg'));
            return Redirect::back() ;
        }
        return Redirect::to('/filter/contributions/by/batch/'.$batch);
    }
    public function getUnreadMessages()
    {
        $users = Message::getUnreadMessages();
        return view('alumni.messages',compact('users'));
    }
    public function getReadMessages()
    {
        $users = Message::getReadMessages();
        return view('alumni.messages',compact('users'));

    }
    public function getUnreadMessage($id)
    {
        $message = Message::findOrFail($id);
        $message->state=1;
        $message->update();
        $msg = '<div class="row">
                    <div class="col-md-12">
                       <h4>'.trans('english.from').$message->email.'</h4> <h2>'.trans('english.subject').$message->subject.'</h2><div><p>'.$message->message.'</p><p>'
            .$message->author.'</p></div>
                    </div>
                </div>';
        return $msg;
    }

    public function filterContributorsBybatch($batch )
    {
        if(Session::has('contributor_id_to_download')){
            Session::forget('contributor_id_to_download');
        }
        Session::put('contributor_batch_to_download',$batch);//this would be accessed if user clicks on download button



        $users = Contribution::getAllContributionsByBatch($batch);
        return view('alumni.viewfilterdContributions',compact('users','batch'));
    }
    public function filterContributorsBybatchAnyMember(Request $request )
    {
        if(Session::has('contributor_id_to_download')){
            Session::forget('contributor_id_to_download');
        }
        $batch = $request->batch_sort;

        if($batch=='none'){
            \Session::flash('select_msg',trans('english.select_msg'));
            return Redirect::back();
        }
        Session::put('contributor_batch_to_download',$batch);//this would be accessed if user clicks on download button


        $users = Contribution::getAllContributionsByBatch($batch);
        return view('alumni.filterMembersViewContributions',compact('users','batch'));
    }

    /**
     * gets users assigned to work on an active project
     */


    public function contactUs()
    {
       return view('contact.contactus');
    }

    /** saves the message of the user
     * @return string
     */
    public function saveContactInfo()
    {
       $contact = new Contact();
       $contact->message= Input::get('message');
       $contact->email= Input::get('email');
       $contact->save();
        \Session::flash('contact_success',trans('english.contact_success'));
       return \Redirect::back();
    }



    public function aboutGoOrderDeliver()
    {
        return ('implementUseraccountController@aboutGoOrderDeliver');
    }

    /**provides basic help information to users on inerest
     * i.e how to use the site to purchase or sell
     * @return string
     */
    public function userHelp()
    {
        return view('contact.help');
    }
    public function verifyEmail($code)
    {
        {
            $user = User::where('confirmation_code',$code)->first();
            if ( $user)
            {
                $user->confirmed = 1;
                $user->confirmation_code = '';
                $user->save();

                \Session::flash('verification_success',trans('english.verification_success'));

                return view('account.login');
            }
            \Session::flash('not_verified',trans('english.email_verified'));
            return \Redirect::back();
        }
    }

    /**
     * @param Request $request
     * @return mixed
     * functions stores details of a newly created user
     */
    public function saveUserDetails(Request $request)
    {

        $name ="";
        if($request->hasFile('profilePicFile')) {
            $file = Input::file('profilePicFile');
            $name = $request->phone.'-'.$file->getClientOriginalName();
            $name= str_replace(" ","",$name);
            //$user->picture = $name;
            $path=public_path('image/alumni/members');
            $path_with_file=public_path('image/alumni/members/'.$name);

            if(!File::exists($path)){
                File::makeDirectory($path,0777,true);
            }
            if(is_writable($path)){

            };
            Image::make($file->getRealPath())->resize(200, 150)->save($path_with_file);

            //$file->move(public_path().'/images/'.$product->category.'/', $name);
        }
        $passwordh="";
        $usernameh ="";
        if($request->password){
          $passwordh = Hash::make($request->password);
          $usernameh = $request->username;
        }
        $id = DB::table('users')->InsertGetId(array('picture'=>$name,'Email'=>$request->input('email'),
            'FirstName'=>$request->input('first_name'),'LastName'=>$request->input('last_name'),
            'Phone'=>$request->input('phone'),'Address'=>$request->input('address'),'Location'=>$request->input('batch'),
            'role_id'=>$request->input('role_id'),'password'=>$passwordh,'UserName'=>$usernameh));

        //User::create($request->all());
        \Session::flash('success',trans('english.account_creation_success'));
        return Redirect::back();
        //return $input;
    }


    public function store_benefactor(Request $request)
    {

        $name ="";
        if($request->hasFile('profilePicFile')) {
            $file = Input::file('profilePicFile');
            $name = $request->phone.'-'.$file->getClientOriginalName();
            $name= str_replace(" ","",$name);
            //$user->picture = $name;
            $path=public_path('image/alumni/members');
            $path_with_file=public_path('image/alumni/members/'.$name);

            if(!File::exists($path)){
                File::makeDirectory($path,0777,true);
            }
            if(is_writable($path)){

            };
            Image::make($file->getRealPath())->resize(200, 200)->save($path_with_file);

            //$file->move(public_path().'/images/'.$product->category.'/', $name);
        }

        $id = DB::table('alumni_members')->InsertGetId(array('picture'=>$name,'email'=>$request->input('email'),
            'first_name'=>$request->input('first_name'),'last_name'=>$request->input('last_name'),
            'phone'=>$request->input('phone'),'address'=>$request->input('address'),
            'role_id'=>'50','batch'=>'2000')  );
        //User::create($request->all());
        \Session::flash('benefactor_success',trans('english.benefactor_success'));
        return Redirect::back();
        //return $input;
    }



    public function payPurchaseOrderByMoMo() {

        $momo_number = Input::get('momo_number');
        $payment_channel = 1;//"Mobile Money";
        $acctRef = trans('english.purchase_order');
        $prefLang = Session::get('locale');
        $amount=0;
        if(Session::has('amountToPay')){
            $amount=Session::get('amountToPay');
        }
        /*
        $momoResponse = /Momo::makeMomoPayment($momo_number, $amount , $acctRef, $prefLang);
        $ProcessingNumber = $momoResponse['ProcessingNumber'];
        $ThirdPartyAcctRef = $momoResponse['ThirdPartyAcctRef'];
        $SenderID = $momoResponse['SenderID'];
        $StatusCode = $momoResponse['StatusCode'];
        $StatusDesc = $momoResponse['StatusDesc'];
        $MOMTransactionID = $momoResponse['MOMTransactionID'];
       */
        $StatusCode = "01";
        $amount = "01";
        $MOMTransactionID = time();
        $payments = "<div class = 'alert alert-danger'>".trans('english.fail_transaction')."</div>";
        switch($StatusCode){
            case '01':
                $payments = "<div class = 'alert alert-info'>"
                    .trans('english.success_transaction')
                    ."</div>";
                Order::storeOrder($payment_channel,$momo_number,$MOMTransactionID);

                /* etVignette($car_id, , , , $payment_code,
                     $amount, $fiscal_years_id, $validator_id, $collection_point_id);*/
                break;
            case '100':
                $payments = "<div class = 'alert alert-danger'> "
                    .trans('english.pay_error_transaction')
                    . "</div>";
                break;
            default:
                $payments = "<div class = 'alert alert-danger'>"
                    . trans('english.bad_transaction')
                    . "</div> ";
                break;
        }
        return $payments;
    }

    public function changeLanguage() {
        $lang = Input::get('lang');
        Session::set('locale',$lang );
        return Redirect::back();

    }


}
