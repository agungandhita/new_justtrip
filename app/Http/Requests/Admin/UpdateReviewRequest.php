<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_reviewer' => ['required', 'string', 'max:255'],
            'rating'        => ['required', 'integer', 'min:1', 'max:5'],
            'komentar'      => ['required', 'string'],
            'destinasi'     => ['nullable', 'string', 'max:255'],
            'foto_reviewer' => ['nullable', 'string', 'max:500'],
            'is_active'     => ['boolean'],
            'order_column'  => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_reviewer.required' => 'Nama reviewer wajib diisi.',
            'rating.required'        => 'Rating wajib diisi.',
            'komentar.required'      => 'Komentar wajib diisi.',
        ];
    }
}
