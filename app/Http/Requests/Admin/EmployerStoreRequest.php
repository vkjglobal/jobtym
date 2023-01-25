<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmployerStoreRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'company_name' => 'required|string|min:3',
            'email' => 'required|email|unique:employers,email',
            'phone' => 'required|numeric|min:7|max:15',
            'company_phone' => 'required|numeric|min:7|max:15',
            'address' => 'required|string|min:5',
            'street' => 'required|string|min:3',
            'city' => 'required|string|min:3',
            'country' => 'required|string|min:3',
            'tin' => 'required|string|min:3',
            'about' => 'required|string|min:10',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
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
