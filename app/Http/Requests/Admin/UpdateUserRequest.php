<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'phone' => 'required|numeric|min:7|max:15',
            'secondary_phone' => 'required|numeric|min:7|max:15',
            'country' => 'required|min:3',
            'isResident' => 'required',
            'street' => 'required|string|min:3',
            'city' => 'required|string|min:3',
            'town' => 'required|string|min:3',
            'division' => 'required|string|min:3',
            'postal_address' => 'required',
            'tin' => 'required|string',
            'vaccination_ref_number' => 'required||min:3string',
            'image' => 'nullable|mimes:jpg,jpeg,png,bmp,tiff,svg|max:4096',
        ];
    }
    public function messages(){
        return [
            'phone.min' => 'The Phone number must be at least 7 characters.',
            'phone.max' => 'The phone must not be greater than 15.',
            'company_phone.min' => 'The company phone number must be at least 7 characters.',
            'company_phone.max' => 'The company phone must not be greater than 15.',
        ];
    }
}
