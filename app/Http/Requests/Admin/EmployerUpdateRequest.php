<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmployerUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'company_name' => 'required|string',
            'email' => 'required|email|unique:employers,email,' . $this->employer->id,
            'phone' => 'required',
            'company_phone' => 'required',
            'address' => 'required',
            'street' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'tin' => 'required|string',
            'about' => 'required',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
