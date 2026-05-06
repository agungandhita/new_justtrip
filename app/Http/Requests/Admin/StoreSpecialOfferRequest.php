<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpecialOfferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'layanan_id'          => ['nullable', 'exists:layanan,layanan_id'],
            'title'               => ['required', 'string', 'max:255'],
            'description'         => ['nullable', 'string'],
            'original_price'      => ['required', 'numeric', 'min:0'],
            'discounted_price'    => ['required', 'numeric', 'min:0'],
            'discount_percentage' => ['required', 'numeric', 'min:0', 'max:100'],
            'valid_from'          => ['required', 'date'],
            'valid_until'         => ['required', 'date', 'after_or_equal:valid_from'],
            'is_active'           => ['boolean'],
            'is_featured'         => ['boolean'],
            'terms_conditions'    => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'               => 'Judul promo wajib diisi.',
            'original_price.required'      => 'Harga asli wajib diisi.',
            'discounted_price.required'    => 'Harga promo wajib diisi.',
            'discount_percentage.required' => 'Persentase diskon wajib diisi.',
            'valid_from.required'          => 'Tanggal mulai berlaku wajib diisi.',
            'valid_until.required'         => 'Tanggal akhir berlaku wajib diisi.',
            'valid_until.after_or_equal'   => 'Tanggal akhir harus setelah tanggal mulai.',
        ];
    }
}
