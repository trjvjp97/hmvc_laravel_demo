<?php


namespace Core\Services;


use Core\Repositories\Contracts\ResetPasswordRepositoryContract;
use Core\Services\Contracts\ResetPasswordServiceContract;

class ResetPasswordService implements ResetPasswordServiceContract
{

    protected $repository;

    public function __construct(ResetPasswordRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function checkEmail($email)
    {
        $user = $this->repository->findEmail($email);
        if(count($user)<1){
            return false;
        }else return true;
    }

    public function validateOtp($email, $otpValue)
    {
       $otp = $this->repository->findOtp($email);
    }
}
