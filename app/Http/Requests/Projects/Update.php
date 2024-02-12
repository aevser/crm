<?php

namespace App\Http\Requests\Projects;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'user_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'settings' => ['required', 'string'],
            'api_token' => ['required', 'string'],
            'timezone' => ['nullable', 'string'],
            'enabled' => ['nullable', 'boolean'],
            'lead_validation_days' => ['nullable', 'integer'],
            'detect_region' => ['nullable', 'boolean'],
            'calltracking' => ['nullable', 'boolean'],
            'leads_today' => ['required', 'integer'],
            'leads_total' => ['required', 'integer'],
        ];
    }
}
