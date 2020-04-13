<?php

namespace App\Http\Controllers;
use App\AlumniMember;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Hash;
use Input;
use Validator;
use DB;
use App\User;
use App\Patient;
use Session;
use File;
use Image;
use App\Message;
use App\Blog;
class LoginController extends Controller
{
    protected $redirectPath = '/';
    /**show form for changing password
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        return view('account.changepaswd');
    }
 public function updateUserProfile()
    {

        $user = DB::table('alumni_members')
            ->join('roles',"alumni_members.role_id","=","roles.role_id")
            ->join('users',"alumni_members.user_id","=","users.userId")
            ->select('users.username',"users.userId","alumni_members.*","roles.role_id","roles.name as role_name")
            ->where('users.userId',Auth::user()->alumni_id)->first();
        return view('account.updateprofile',compact('user'));
    }

    /**checks if inputs meet specified conditions
     * @param array $data
     * @return mixed
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:80|unique:users',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * @return string
     * saves new user's password and logout the user
     */
    public function updatePassword()
    {
        if(Auth::user()){
            $password= Hash::make(Input::get('password'));
            $user = User::findOrNew(Auth::user()->userId);
            $user->password= $password;

            $user->save();
            Auth::logout();
            \Session::flash("passwd_changed",trans('english.password_success'));
        return view('account.login');
        }
        return ("404 Attempting Unauthorized action");
    }
    public function saveContactMessage(Request $request)
    {
            $mesage = new Message();
            $mesage->author = $request->get('author');
            $mesage->subject = $request->get('subject');
            $mesage->email = $request->get('email');
            $mesage->message = $request->get('comment');
            $mesage->save();

            \Session::flash("msg_success",trans('english.msg_success'));
        return Redirect::back();

    }
    public function saveBlogMessage(Request $request)
    {
            $mesage = new Blog();
            $mesage->user_id = $request->get('user_id');
            $mesage->subject = $request->get('subject');
            $mesage->message = $request->get('comment');
            $mesage->save();

            \Session::flash("blog_success",trans('english.blog_success'));
        return Redirect::back();

    }

    /** verifies user credentials and directs him to home page
     * @return  \Illuminate\Http\Response
     */
   public function authenticateUser(Request $request)
    {
		//return $hsh = Hash::make('munde2015');
        $root = getenv('BASE_URL').'/' ?: 'localhost:8000/';
        $this->validate($request,
            ['username'=>'required','password'=>'required']
        );
        $username = $request->input('username');
        $password =$request->input('password');


        if ((Auth::attempt(['UserName' => $username, 'password' => $password],true)))
        {
            \Session::flash('logged_in',trans('english.loginSuccess'));
            // $users = User::all(['user_id'])->where('username',$username)->where('user_id',Auth::user()->user_id);
           $user  = Auth::user();//->user_id;

                $role_id =$user->role_id;
                $privileges= DB::select(DB::raw("SELECT * from privileges  WHERE
                 privileges.privilege_id IN ( SELECT roles_has_privileges.privilege_id FROM roles_has_privileges WHERE roles_has_privileges.role_id=$role_id)ORDER BY privileges.privilege_id DESC
                 "));
                /*Sub privileges*/
                $sub_priv = DB::select(DB::raw("Select * From sub_privileges WHERE sub_privileges.privilege_id IN
                (SELECT roles_has_privileges.privilege_id from roles_has_privileges WHERE roles_has_privileges.role_id=$role_id)"));
                /*implement left panel here before sending data*/
            return Redirect::to('/admin/dashboardg/welcome');

        }
        return \Redirect::back()->withInput($request->only('username'))
            ->withErrors(['email'=>"Credentials provided are incorrect!"]);
    }
    public function goToDashboard(){

        return view('admin.admindashboard');
    }
    /**
     * logout user and redirect to home page
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
       /* return view('index');*/
        return redirect('/ghs/bafut/welcome');
    }

    /**
     * Show login form.
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
         
       if(Auth::user()){
           return $this->goToDashboard();
       }

        return view('account.login');
    }
    public function saveUserUpdate(Request $request)
    {

        $this->validate($request,
            ['email'=>'required','first_name'=>'required','last_name'=>'required','profilePicFile','address' ]
        );
        $user_id = Auth::user()->alumni_id;
        $shop = AlumniMember::findOrNew($user_id);
        $shop->first_name = $request->get('first_name');
        $shop->last_name = $request->get('last_name');
        $shop->email = $request->get('email');
        $shop->address = $request->get('address');
        $shop->phone = $request->get('phone');
        if ($request->hasFile('profilePicFile')) {
            $file = Input::file('profilePicFile');
            $name = Auth::user()->userId . '-' . $file->getClientOriginalName();
            $name = str_replace(" ", "", $name);

            $path = public_path('image/alumni/mambers');
            $old_image =public_path('image/alumni/mambers/'.$shop->picture);
            if(File::exists($old_image)){
                unlink($old_image); //delete old image
            }
            $shop->picture = $name;
            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true);

            }
            $path_with_file = public_path('images/user/' . $name);
            Image::make($file->getRealPath())->resize(130, 130)->save($path_with_file);
            $file->move(public_path() . '/images/user/', $name);
        }

        $shop->update();
        \Session::flash('register_success',trans('english.user_updated'));
        $user=DB::table('users')->join('quarters','quarters.quarter_id','=','users.userId')
            ->select('users.*','quarters.*')->where('userId',Auth::user()->userId)->first();
        return Redirect::back()->with('user',$user);
    }
}
