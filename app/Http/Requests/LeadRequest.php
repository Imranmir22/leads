<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|min:10|max:20',
            'source' => 'required|max:191',
            'status' => "required|in:".implode(',',config('custom.lead_status')),
            'description' => 'nullable',
        ];
    }
}
