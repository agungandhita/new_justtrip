<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'layanan_id'            => ['required', 'string', 'exists:layanan,layanan_id'],
            'jumlah_peserta'        => ['required', 'integer', 'min:1'],
            'tanggal_keberangkatan' => ['required', 'date', 'after:today'],
            'special_offer_id'      => ['nullable', 'string', 'exists:special_offers,id'],
            'catatan_khusus'        => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'layanan_id.required'            => 'Paket wisata wajib dipilih.',
            'layanan_id.exists'              => 'Paket wisata tidak ditemukan.',
            'jumlah_peserta.required'        => 'Jumlah peserta wajib diisi.',
            'jumlah_peserta.min'             => 'Jumlah peserta minimal 1 orang.',
            'tanggal_keberangkatan.required' => 'Tanggal keberangkatan wajib diisi.',
            'tanggal_keberangkatan.after'    => 'Tanggal keberangkatan harus setelah hari ini.',
        ];
    }
}
