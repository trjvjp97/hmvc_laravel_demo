<?php


namespace Core\Modules\Auth\Requests;


use Illuminate\Foundation\Http\FormRequest;

class OTPRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
          'num1' => 'required',
          'num2' => 'required',
          'num3' => 'required',
          'num4' => 'required',
          'num5' => 'required',
          'num6' => 'required',
        ];
    }

    public function messages()
    {
       return [
           'num1.required' => 'Please fill all the pin code',
           'num2.required' => 'Please fill all the pin code',
           'num3.required' => 'Please fill all the pin code',
           'num4.required' => 'Please fill all the pin code',
           'num5.required' => 'Please fill all the pin code',
           'num6.required' => 'Please fill all the pin code',
       ];
    }
}
