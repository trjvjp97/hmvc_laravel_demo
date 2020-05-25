<?php


namespace Core\Modules\Auth\Controllers;


use App\Http\Controllers\Controller;
use Core\Modules\Auth\Requests\MailResetRequest;
use Core\Modules\Auth\Requests\OTPRequest;
use Core\Services\Contracts\ResetPasswordServiceContract;
use Illuminate\Support\Facades\Cookie;

class ResetPasswordController extends Controller
{

    protected $service;

    public function __construct(ResetPasswordServiceContract $service)
    {
        $this->service = $service;
    }

    public function reset(){
        return view('Auth::auth.reset');
    }

    public function checkMail(MailResetRequest $request){

        $isExistsEmail = $this->service->checkEmail($request->email);
        if($isExistsEmail===true){
            $cookie = Cookie::make('email',$request->email);
            $view = 'emails.email';
            $otp = $this->service->createOtp($request->email);
            $this->service->sendEmail($request->email,$otp['otp_value'],$view);
            return redirect()->route('Auth.auth.otp')->withCookies([$cookie]);
        }else{
            return redirect()->route('Auth.auth.reset')->withErrors(['email'=>'User is not Exists']);
        }

    }

    public function otp(){
        return view('Auth::auth.otp');
    }

    public function validatorOtp(OTPRequest $request){
        $email = $request->cookie('email');
        $isCorrected = $this->service->validateOtp($email,$request->all());
        if($isCorrected == false){
            return redirect()->back()->withErrors(['otp'=>'Incorrect']);
        }else{
            $newPass = $this->service->resetPassword($email);
            $this->service->sendEmail($email,$newPass,'emails.newpassword');
            Cookie::queue(Cookie::forget('email'))  ;
            return redirect()->route('login')->with('reset','Password has been reset. Pls check your email!');
        }

    }

}
