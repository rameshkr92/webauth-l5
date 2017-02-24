<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ContactUS extends Model

{


    public $table = 'contactus';


    public $fillable = ['name','phone','email','message'];


}
