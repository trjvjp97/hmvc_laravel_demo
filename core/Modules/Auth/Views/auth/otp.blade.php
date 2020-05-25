@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center otp">
                    Your OTP send to your Email. Please check then put here
                    <form action="{{route('Auth.auth.validator')}}" method="POST" class="box-otp">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div onclick="clickOtpInput(this)" class="box-input"><input id="1" name="num1" onkeyup="changeInput(this)" class="input-otp" type="text" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" /></div>
                        <div onclick="clickOtpInput(this)" class="box-input"><input id="2" name="num2" onkeyup="changeInput(this)" class="input-otp" type="text" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" /></div>
                        <div onclick="clickOtpInput(this)" class="box-input"><input id="3" name="num3" onkeyup="changeInput(this)" class="input-otp" type="text" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" /></div>
                        <div onclick="clickOtpInput(this)" class="box-input"><input id="4" name="num4" onkeyup="changeInput(this)" class="input-otp" type="text" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" /></div>
                        <div onclick="clickOtpInput(this)" class="box-input"><input id="5" name="num5" onkeyup="changeInput(this)" class="input-otp" type="text" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" /></div>
                        <div onclick="clickOtpInput(this)" class="box-input"><input id="6" name="num6" onkeyup="changeInput(this)" class="input-otp" type="text" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" /></div>
                        <div><input type="submit" value="Confirm"/></div>
                    </form>
                    @if(isset($errors->all()[0]))
                        <p class="alert-danger">{{$errors->all()[0]}}</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
