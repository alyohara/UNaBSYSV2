<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaRequest extends FormRequest
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
            'email' => 'required|unique:personas,email,' . $this->input('edit'),
            'userType_id' => 'required',
            'name'=>'required',
            'lastname'=>'required',
            'address'=>'required',
            'birth'=>'required|date',
            'gender'=>'required',
            'phone'=>'required',
            'doc'=>'required',
            'file' => 'mimes:csv,txt,xlx,xls,pdf,jpg,jpeg,png,tiff|max:12048'
        ];
    }
}
