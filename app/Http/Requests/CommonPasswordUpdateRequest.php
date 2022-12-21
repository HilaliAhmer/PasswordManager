<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommonPasswordUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'title'=>'required|min:3|max:200',
            'username'=>'required|min:3|max:200',
            'password'=>'required|min:8|max:200',
            'password_type_id'=>'required',
        ];
    }
    public function Attributes()
    {
        return[
            'title'=>'Şifre başlığı',
            'username'=>'Kullanıcı adı',
            'password'=>'Şifre',
            'password_type_id'=>'Şifre tipi',
        ];
    }
}
