<?php


namespace Core\Services\Contracts;


interface ResetPasswordServiceContract
{
    public function checkEmail($email);
    public function sendEmail($email,$value,$view);
    public function validateOtp($email,$data);
    public function createOtp($email);
    public function resetPassword($email);
}
