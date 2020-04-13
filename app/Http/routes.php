<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('homepage');
});
Route::get('/ghs/bafut/welcome', function () {
    return view('homepage');
});
Route::get('/about/ghs/bafut', function () {
    return view('aboutghs');
});
Route::get('/ghsbafut/campus/tour', function () {
    return view('campustour');
});
Route::get('/ghsbafut/staff', function () {
    return view('staffgallery');
});
Route::get('/ghsbafut/alumni/association', function () {
    return view('alumni.alumnihome');
});
Route::get('/ghsbafut/accademic/achievements', function () {
    return view('academics');
});
Route::get('/event/get/full/event/description/{event_id}', ['as'=>'show_event_details','uses'=>'EventController@getEventDetails']);
Route::get('/admin/dashboardg/welcome', ['as'=>'show_admin_dashboard','uses'=>'LoginController@goToDashboard']);
Route::get('/ghsbafut/portfolio', function () {
    return view('portfolio');
});


//useraccount controllerroutes
Route::get('/new/user/register',['as'=>'signup','uses'=>'UserAccountController@register']);
Route::post('/new/user/register',['as'=>'store_details','uses'=>'UserAccountController@saveUserDetails']);
Route::get('/new/patient/register',['as'=>'add_patient','uses'=>'UserAccountController@registerPatient']);
Route::post('/new/patient/register',['as'=>'store_patient','uses'=>'UserAccountController@savePatientDetails']);

Route::post('/new/benefactor/user/register',['as'=>'save_benefactor','uses'=>'UserAccountController@store_benefactor']);
Route::get('/new/benefactor/user/register',['as'=>'save_benefactor','uses'=>'UserAccountController@store_benefactor']);
Route::get('/user/contactus',['as'=>'contact_us','uses'=>'UserAccountController@contactUs']);
Route::post('/user/contactus',['as'=>'save_message','uses'=>'UserAccountController@saveContactInfo']);
Route::get('/verified/shop/products/{id}',['as'=>'verified_shop','uses'=>'UserAccountController@getVerifiedShopProducts']);
Route::get('/about/go-orderDeliver',['as'=>'about_site','uses'=>'UserAccountController@aboutGoOrderDeliver']);
Route::get('/user/guide',['as'=>'site_help','uses'=>'UserAccountController@userHelp']);
Route::get('register/verify/{code}',['as'=>'verify_email','uses'=>'UserAccountController@verifyEmail']);
Route::get('language',['as'=>'lang','uses'=>'UserAccountController@changeLanguage']);
Route::post('users/profile/update',['as'=>'save_user_profileupdate','uses'=>'UserAccountController@saveUserUpdate']);
Route::get('users/profile/update/{id}',['uses'=>'UserAccountController@updateProfile']);
Route::get('user/contribution/view',['uses'=>'UserAccountController@getUserAndContributions']);
Route::get('/lybexsa/view/members/contributions',['uses'=>'UserAccountController@getUserAndContributionsByAnyMember']);

Route::get('/registered/user/password/reset',['as'=>'site_help','uses'=>'UserAccountController@resetPassword']);
Route::get('/get/unread/messages',['as'=>'get_messages','uses'=>'UserAccountController@getUnreadMessages']);
Route::get('/get/unread/message/{id}',['as'=>'get_message','uses'=>'UserAccountController@getUnreadMessage']);
Route::get('/get/some/read/messages',['as'=>'get_read_message','uses'=>'UserAccountController@getReadMessages']);
Route::post('/user/registration/store',['as'=>'store_user','uses'=>'UserAccountController@saveUserDetails']);
Route::post('/filter/contributions/by/batch/{batch}',['as'=>'filter_contributors_batch','uses'=>'UserAccountController@filterContributorsBybatchRedirect']);
Route::post('/members/filter/contributions/by/batch',['as'=>'mem_filter_contributors_batch','uses'=>'UserAccountController@filterContributorsBybatchAnyMember']);
Route::get('/members/filter/contributions/by/batch',['as'=>'mem_filter_contributors_batch','uses'=>'UserAccountController@filterContributorsBybatchAnyMember']);
Route::get('/filter/contributions/by/batch/{batch}',['as'=>'filter_contributors_batch','uses'=>'UserAccountController@filterContributorsBybatch']);
Route::get('/filter/contributions/by/userId/{user_id}',['as'=>'filter_contributors_ByID','uses'=>'UserAccountController@filterContributorsByUserID']);

/*Login controller handles authentication and password changing*/
Route::get('/user/password/update',['as'=>'change_pwd','uses'=>'LoginController@changePassword']);
Route::get('/user/account/update',['as'=>'update_user_profile','uses'=>'LoginController@updateUserProfile']);
/*Route::post('/user/account/update',['as'=>'save_user_profileupdate','uses'=>'LoginController@saveUserUpdate']);*/
Route::post('/user/password/update',['as'=>'save_changepaswd','uses'=>'LoginController@updatePassword']);
Route::get('/user/auth/logout',['as'=>'logout','uses'=>'LoginController@logout']);
Route::get('/start/user/login',['as'=>'login','uses'=>'LoginController@login']);
Route::post('/start/user/login',['as'=>'auth_user','uses'=>'LoginController@authenticateUser']);
Route::get('/new/message',['as'=>'user_msg','uses'=>'LoginController@ContactMessage']);
Route::post('/new/message',['as'=>'user_msg','uses'=>'LoginController@saveContactMessage']);

Route::get('/new/blog',['as'=>'user_blog','uses'=>'LoginController@CreateBlogMessage']);
Route::post('/new/blog',['as'=>'save_blog','uses'=>'LoginController@saveBlogMessage']);



/*Admin control */
Route::get('admin/dashboard/manage',['uses'=>'AdminController@manage']);
Route::get('product/add',['uses'=>'AdminController@showAddProductPage']);
//Route::get('admin/admindashboard',['middleware'=>'userauth','uses'=>'AdminController@adminmanage']);
Route::get('testauth','AdminController@manage');
Route::get('users/{user_id}', 'AdminController@destroy');
Route::get('users/suspend/{user_id}', 'AdminController@restoreUser');
Route::get('record/user/contribution', 'AdminController@recordUserContribution');
Route::post('record/user/contribution',['as'=>"save_contribution", 'uses'=>'AdminController@saveUserContribution'] );

Route::get('admin/dashboard/users/delete',['as'=>'delete_user','uses'=>'AdminController@deleteUser']);
Route::get('admin/dashboard/admin/add',['as'=>'add_admin','uses'=>'AdminController@addAdmin']);
Route::post('admin/dashboard/admin/add',['as'=>'store_admin','uses'=>'AdminController@updateUserAsAdmin']);
Route::post('admin/dashboard/new/admin/add',['as'=>'store_new_admin','uses'=>'AdminController@saveNewAdminDetails']);
Route::get('/dashboard/show/registered/users',['as'=>'select_user','uses'=>'AdminController@showusers']);
Route::post('/dashboard/show/registered/users',['as'=>'select_user_cat','uses'=>'AdminController@sortUsers']);

Route::get('admin/dashboard/sales/statistics',['as'=>'select_user','uses'=>'AdminController@']);
Route::post('admin/dashboard/sales/statistics',['as'=>'select_user','uses'=>'AdminController@getSalesPerShop']);
Route::get('user/contribution/update/{contribution_id}',['uses'=>'AdminController@updateUserContribution']);
Route::post('user/contribution/update/{contribution_id}',['as'=>'save_contribution_update','uses'=>'AdminController@saveUserUpdatedContribution']);
Route::get('/dashboard/create/new/event',['as'=>'create_event','uses'=>'AdminController@createEvent']);
Route::post('/dashboard/create/new/event',['as'=>'save_event','uses'=>'AdminController@storeNewEvent']);
Route::get('dashboard/view/events',['as'=>'save_event','uses'=>'AdminController@viewEvents']);
Route::get('toggle/event/state/{event_id}',['as'=>'close_event','uses'=>'AdminController@toggleEvent']);
Route::get('update/event/{event_id}',['as'=>'update_event','uses'=>'AdminController@editEvent']);
Route::post('update/event/{event_id}',['as'=>'save_updated_event','uses'=>'AdminController@saveEventUpdate']);
//Working on centers
Route::get('/create/new/center',['as'=>'create_center','uses'=>'AdminController@createCenter']);
Route::post('/create/new/center',['as'=>'save_center','uses'=>'AdminController@storeNewCenter']);

//showPatients
Route::get('/show/registered/patients',['as'=>'show_patients','uses'=>'AdminController@showRegisteredPatients']);
Route::post('/show/registerd/patients',['as'=>'save_updated_patient','uses'=>'AdminController@saveEditedPatient']);


/*Print Controller*/
Route::get('/download/contributions/as/pdf',['uses'=>'PrintController@downloadContributions']);
