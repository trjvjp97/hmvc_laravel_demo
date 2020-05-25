<?php


namespace Core\Repositories\Contracts;


interface ResetPasswordRepositoryContract
{
    public function findEmail($email);
    public function findOtp($email);
    public function createOtp($email);
    public function resetPassword($email,$newPass);
}
