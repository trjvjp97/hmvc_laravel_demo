<?php


namespace Core\Repositories;

use App\User;
use Core\Modules\Auth\Models\OTP;
use Core\Repositories\Contracts\ResetPasswordRepositoryContract;
use Illuminate\Support\Facades\Hash;

class ResetPasswordRepository implements ResetPasswordRepositoryContract
{

    protected $user;
    protected $otp;

    public function __construct(User $user,OTP $otp)
    {
        $this->user = $user;
        $this->otp = $otp;
    }

    public function findEmail($email)
    {
        return $this->user->where('email',$email)->first();
    }

    public function findOtp($email)
    {
        return $this->otp->where('email',$email)->orderBy('created_at','DESC')->first();
    }

    public function createOtp($data)
    {
        return $this->otp->create($data);
    }

    public function resetPassword($email,$newPass)
    {
        $item = $this->findEmail($email);
        $item->password = Hash::make($newPass);
        $item->update();
    }
}
