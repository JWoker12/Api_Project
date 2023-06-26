<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:100',
            'description' => 'required|string|min:1',
            'start_date' => 'required|date_format:Y-m-d',
            'dead_line' => 'required|after_or_equal:today|date_format:Y-m-d'
        ];
    }
}
