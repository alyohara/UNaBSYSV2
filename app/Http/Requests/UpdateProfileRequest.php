<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [


            'email' => 'required|email:rfc,dns|unique:users,email' . auth()->user()->id,
            'username' => 'required|unique:users,username' . auth()->user()->id,
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'doc' => ['required','unique:personas,doc,'. auth()->user()->persona_id],

            'name'=>'required',
            'lastname'=>'required',
            'address'=>'required',
            'birth'=>'required|date',
            'gender'=>'required',
            'phone'=>'required',
        ];
    }
}
