<?php


namespace Core\Modules\Book\Requests;


use Illuminate\Foundation\Http\FormRequest;

class EditBookRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            "title" => "required",
            "author" => "required",
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Missing Title',
            'author.required' => 'Missing Author',
        ];
    }
}
