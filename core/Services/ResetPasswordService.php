<?php


namespace Core\Services;


use Core\Repositories\Contracts\ResetPasswordRepositoryContract;
use Core\Services\Contracts\ResetPasswordServiceContract;
use Illuminate\Support\Facades\Mail;

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
        if($user===null){
            return false;
        }else return true;
    }



    public function validateOtp($email,$data)
    {
        $otp = $this->repository->findOtp($email)->otp_value;
        $otpReq = $data['num1'].$data['num2'].$data['num3'].$data['num4'].$data['num5'].$data['num6'];
        if($otp == $otpReq){
            return true;
        }else return false;
    }

    public function sendEmail($email,$value,$view)
    {
        $to_name = '';
        $to_email = $email;
        // $otp = $this->createOtp($email);
        $data = array('name'=>'Ogbonna','item'=>$value);
        Mail::send($view, $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Laravel Test Mail');
        $message->from('from@example.com','Test Mail');
        });
    }

    public function createOtp($email)
    {
        $num1 = rand(0,9);
        $num2 = rand(0,9);
        $num3 = rand(0,9);
        $num4 = rand(0,9);
        $num5 = rand(0,9);
        $num6 = rand(0,9);
        $data = [
            'email' => $email,
            'otp_value' => $num1.$num2.$num3.$num4.$num5.$num6,
            'otp_validated' => false
        ];
        $this->repository->createOtp($data);
        return $data;
    }

    public function resetPassword($email)
    {
        $newPass = rand(100000,999999);
        $this->repository->resetPassword($email,$newPass);
        return $newPass;
    }
}
