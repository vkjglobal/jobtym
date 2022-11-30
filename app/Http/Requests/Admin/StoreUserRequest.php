<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'phone' => 'required|numeric',
            'secondary_phone' => 'required|numeric',
            'country' => 'required',
            'isResident' => 'required',
            'street' => 'required|string',
            'city' => 'required|string',
            'town' => 'required|string',
            'division' => 'required|string',
            'postal_address' => 'required',
            'tin' => 'required|string',
            'vaccination_ref_number' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,bmp,tiff,svg|max:4096',
        ];
    }
}
