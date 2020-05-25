<?php


namespace Core\Modules\Auth\Requests;



use Illuminate\Foundation\Http\FormRequest;

class MailResetRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
          'email' => 'required'
        ];
    }
}
