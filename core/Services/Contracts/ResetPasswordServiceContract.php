<?php


namespace Core\Services\Contracts;


interface ResetPasswordServiceContract
{
    public function checkEmail($email);
    public function validateOtp($email,$otpValue);
}
