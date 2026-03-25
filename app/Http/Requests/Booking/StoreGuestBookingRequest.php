<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuestBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'destinasi_dicari'               => ['required', 'string', 'max:255'],
            'nama_lengkap'                   => ['required', 'string', 'max:255'],
            'email'                          => ['required', 'email', 'max:255'],
            'nomor_telepon'                  => ['required', 'string', 'max:20'],
            'alamat'                         => ['required', 'string', 'max:500'],
            'kota'                           => ['required', 'string', 'max:100'],
            'provinsi'                       => ['required', 'string', 'max:100'],
            'jumlah_peserta'                 => ['required', 'integer', 'min:1'],
            'tanggal_keberangkatan'          => ['required', 'date', 'after:today'],
            'is_custom_request'              => ['boolean'],
            'layanan_id'                     => ['nullable', 'string', 'exists:layanan,layanan_id'],
            'budget_estimasi'                => ['nullable', 'numeric', 'min:0'],
            'catatan_tambahan'               => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'destinasi_dicari.required'      => 'Destinasi wajib diisi.',
            'nama_lengkap.required'          => 'Nama lengkap wajib diisi.',
            'email.required'                 => 'Email wajib diisi.',
            'nomor_telepon.required'         => 'Nomor telepon wajib diisi.',
            'alamat.required'                => 'Alamat wajib diisi.',
            'kota.required'                  => 'Kota wajib diisi.',
            'provinsi.required'              => 'Provinsi wajib diisi.',
            'jumlah_peserta.required'        => 'Jumlah peserta wajib diisi.',
            'tanggal_keberangkatan.required' => 'Tanggal keberangkatan wajib diisi.',
            'tanggal_keberangkatan.after'    => 'Tanggal keberangkatan harus setelah hari ini.',
        ];
    }
}
