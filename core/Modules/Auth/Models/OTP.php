<?php


namespace Core\Modules\Auth\Models;


use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    protected $table = "otp";
    protected $fillable = ['email','otp_value','otp_validated'];
}
