<?php


namespace Core\Repositories\Contracts;


interface ResetPasswordRepositoryContract
{
    public function findEmail($email);
    public function findOtp($email);

}
