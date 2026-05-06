<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGalleryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul'         => ['required', 'string', 'max:255'],
            'lokasi_tujuan' => ['required', 'string', 'max:255'],
            'deskripsi'     => ['nullable', 'string'],
            'tanggal_trip'  => ['nullable', 'date'],
            'kategori'      => ['nullable', 'string', 'max:100'],
            'cover_image'   => ['nullable', 'string', 'max:500'],
            'is_active'     => ['boolean'],
            'images'        => ['nullable', 'array'],
            'images.*'      => ['string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required'         => 'Judul album wajib diisi.',
            'lokasi_tujuan.required' => 'Lokasi tujuan wajib diisi.',
        ];
    }
}
