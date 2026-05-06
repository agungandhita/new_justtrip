<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul'        => ['required', 'string', 'max:255'],
            'konten'       => ['required', 'string'],
            'ringkasan'    => ['nullable', 'string', 'max:500'],
            'kategori'     => ['nullable', 'string', 'max:100'],
            'gambar_utama' => ['nullable', 'string', 'max:500'],
            'is_published' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required'  => 'Judul artikel wajib diisi.',
            'konten.required' => 'Konten artikel wajib diisi.',
        ];
    }
}
