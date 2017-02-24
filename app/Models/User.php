<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Logic\User\CaptureIp;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

// REGISTRATION VALIDATION RULES
    public static $rules = [
        'username'                          => 'required',
        'first_name'                    => 'required',
        'last_name'                     => 'required',
        'email'                         => 'required|email|unique:users',
        'password'                      => 'required|min:6|max:20',
        'password_confirmation'         => 'required|same:password',
        'g-recaptcha-response'          => 'required'
    ];

    // REGISTRATION ERROR MESSAGES
    public static $messages = [
        'username.required'                 => 'Username is required',
        'first_name.required'           => 'First Name is required',
        'last_name.required'            => 'Last Name is required',
        'email.required'                => 'Email is required',
        'email.email'                   => 'Email is invalid',
        'password.required'             => 'Password is required',
        'password.min'                  => 'Password needs to have at least 6 characters',
        'password.max'                  => 'Password maximum length is 20 characters',
        'g-recaptcha-response.required' => 'Captcha is required'
    ];

    // ACCOUNT EMAIL ACTIVATION
    public function accountIsActive($code) {

        // CHECK IF ACTIVATION CODE MATCHES THE ONE WE SENT
        $user = User::where('activation_code', '=', $code)->first();
        // GET IP ADDRESS
        $userIpAddress                          = new CaptureIp;
        $user->signup_confirmation_ip_address   = $userIpAddress->getClientIp();

        // SET THE USER TO ACTIVE
        $user->active                           = 1;

        // CLEAR THE ACTIVATION CODE
        $user->activation_code                  = '';

        // SAVE THE USER
        if($user->save()) {
            \Auth::login($user);
        }
        return true;
    }
    /*
    |--------------------------------------------------------------------------
    | ACL Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Checks a Permission
     *
     * @param  String permission Slug of a permission (i.e: manage_user)
     * @return Boolean true if has permission, otherwise false
     */
    public function can($permission = null)
    {
        return !is_null($permission) && $this->checkPermission($permission);
    }

    /**
     * Check if the permission matches with any permission user has
     *
     * @param  String permission slug of a permission
     * @return Boolean true if permission exists, otherwise false
     */
    protected function checkPermission($perm)
    {
        $permissions = $this->getAllPernissionsFormAllRoles();

        $permissionArray = is_array($perm) ? $perm : [$perm];

        return count(array_intersect($permissions, $permissionArray));
    }

    /**
     * Get all permission slugs from all permissions of all roles
     *
     * @return Array of permission slugs
     */
    protected function getAllPernissionsFormAllRoles()
    {
        $permissionsArray = [];

        $permissions = $this->roles->load('permissions')->fetch('permissions')->toArray();

        return array_map('strtolower', array_unique(array_flatten(array_map(function ($permission) {

            return array_fetch($permission, 'permission_slug');

        }, $permissions))));
    }

    /*
    |--------------------------------------------------------------------------
    | Relationship Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Many-To-Many Relationship Method for accessing the User->roles
     *
     * @return QueryBuilder Object
     */
    /*public function roles()
    {
        return $this->belongsToMany('App\Role');
    }*/
    // USER ROLES
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }

    public function hasRole($name)
    {
        foreach($this->roles as $role)
        {
            if($role->role_title == $name) return true;
        }

        return false;
    }

    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

    // SOCIAL MEDIA AUTH
    public function social()
    {
        return $this->hasMany('App\Models\Social');
    }

    // USER PROFILES
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }
    public function profiles()
    {
        return $this->belongsToMany('App\Models\Profile')->withTimestamps();
    }

    public function hasProfile($name)
    {
        foreach($this->profiles as $profile)
        {
            if($profile->role_title == $name) return true;
        }

        return false;
    }

    public function assignProfile($profile)
    {
        return $this->profiles()->attach($profile);
    }

    public function removeProfile($profile)
    {
        return $this->profiles()->detach($profile);
    }
}