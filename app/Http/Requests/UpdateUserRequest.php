<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class UpdateUserRequest extends FormRequest
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
            'doc' => ['required','unique:personas,doc,'.$this->personaid],
            'name'=>'required',
            'lastname'=>'required',
            'address'=>'required',
            'birth'=>'required|date',
            'gender'=>'required',
            'phone'=>'required',
        ];
    }
}
