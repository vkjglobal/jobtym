<?php

namespace App\Http\Requests\Employer\JobPosts;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobPostRequest extends FormRequest
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
            'title' => 'required|string',
            'industry' => 'required|string',
            'type' => 'required',
            'description' => 'required',
            'skills' => 'required',
            'country' => 'required',
            'residentType' => 'required',
            'street' => 'nullable',
            'city' => 'nullable',
            'town' => 'nullable',
            'division' => 'nullable',
            'salaryFrom' => 'nullable|gte:10',
            'salaryTo' => 'nullable|gt:salaryFrom',
            'email' => 'required',
            'schedule_date' => 'nullable|date|after_or_equal:today',
            'deadline' => 'required|date|after:schedule_date',
            'attachment' => 'nullable|max:5000',
        ];
    }
}
