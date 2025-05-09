<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreManagementRequest extends FormRequest
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
            'client_id' => ['required', 'integer'],
            'task' => ['required', 'string'],
            'fecha' => ['required', 'date'],
            'hora' => ['required', 'string'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'client_id.required' => 'El campo Cliente es obligatorio.',
            'task.required' => 'El campo Descripción de Gestión es obligatorio.',
            'fecha.required' => 'El campo Fecha es obligatorio.',
            'hora.required' => 'El campo Hora es obligatorio.',
        ];
    }
}
