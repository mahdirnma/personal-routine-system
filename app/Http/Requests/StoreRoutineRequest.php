<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoutineRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'routine_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'reminder_time' => 'required',
            'reminder_date' => 'required',
            'category_id' => 'required',
            'repeat'=>'required'
        ];
    }
}
