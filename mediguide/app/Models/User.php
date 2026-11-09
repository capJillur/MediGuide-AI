<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name','email','phone','password','role','specialty','license_no','otp_code','otp_expires_at','email_verified_at','doctor_approved_at'];
    protected $hidden = ['password','remember_token','otp_code'];
    protected function casts(): array
    {
        return ['email_verified_at'=>'datetime','doctor_approved_at'=>'datetime','otp_expires_at'=>'datetime','password'=>'hashed'];
    }
}
