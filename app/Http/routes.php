<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('frontend.index');
});*/
//Route::get('/', 'HomeController@index');
//Route::get('/pricing', 'PricingController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'HomeController@index');
    // AUTHENTICATION ALIASES/REDIRECTS
// Authentication Routes...
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');
// Registration Routes...
    $this->get('register', 'Auth\AuthController@showRegistrationForm');
    $this->post('register', 'Auth\AuthController@postRegister');
    // REGISTRATION EMAIL CONFIRMATION ROUTES
    Route::get('/resendEmail', 'Auth\AuthController@resendEmail');
    Route::get('/activate/{code}', 'Auth\AuthController@activateAccount');
// Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');

    /******** Common pages routes start here ********/
    Route::get('contactus', 'CmsController@contactUS');
    Route::post('contactus', ['as'=>'contactus.store','uses'=>'CmsController@contactUSPost']);
    /******** Common pages routes end here *********/
});

//Admin Route start here
/*Route::group(['middleware' => 'acl:manage_user','namespace' => 'Admin', 'prefix' => 'admin'], function()
{
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/home', function () {
        return view('admin.index');
    });
});*/
// Protected Routes by auth and acl middleware
//$router->group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'acl']], function() use ($router)
$router->group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => ['web']], function() use ($router)
{
    Route::get('/login', array('before' => 'auth', 'uses' => 'Auth\AuthController@showLoginForm'));
    Route::get('/', array('before' => 'auth', 'uses' => 'HomeController@index'));
    Route::get('/home', array('before' => 'auth', 'uses' => 'HomeController@index'));
//    Route::get('/', function () {
//        return view('admin.index');
//    });
    $router->get('dashboard', [
        'uses' => 'DashboardController@index',
        'as' => 'dashboard',
        'permission' => 'manage_own_dashboard',
        'menuItem' => ['icon' => 'fa fa-dashboard', 'title' => 'Dashboard']
    ]);

    // Group: Users
    $router->group(['prefix' => 'users', 'namespace' => 'User'], function() use ($router)
    {
        $router->get('/{role?}', [
            'uses' => 'UserController@index',
            'as' => 'admin.users',
            'permission' => 'view_user',
            'menuItem' => ['icon' => 'clip-users', 'title' => 'Manage Users']
        ])->where('role', '[a-zA-Z]+');

        $router->get('view/{id}', [
            'uses' => 'UserController@viewUserProfile',
            'as' => 'admin.user.view',
            'permission' => 'view_user'
        ]);
    });
});
