<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreLayananRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_layanan'  => ['required', 'string', 'max:255'],
            'jenis_layanan' => ['required', 'string', 'in:open_trip,private_trip,request_trip'],
            'wilayah'       => ['nullable', 'string', 'in:domestik,internasional'],
            'lokasi_tujuan' => ['required', 'string', 'max:255'],
            'status'        => ['required', 'string', 'in:aktif,nonaktif'],
            'deskripsi'     => ['nullable', 'string'],
            'durasi_hari'   => ['nullable', 'integer', 'min:1'],
            'harga_per_orang' => ['nullable', 'numeric', 'min:0'],
            'kuota_maksimal'  => ['nullable', 'integer', 'min:1'],
            'itinerary'     => ['nullable', 'array'],
            'fasilitas_include' => ['nullable', 'string'],
            'fasilitas_exclude' => ['nullable', 'string'],
            'catatan_penting'   => ['nullable', 'string'],
            'gambar_utama'      => ['nullable', 'image', 'max:5120'], // 5MB max
            'gambar_destinasi'  => ['nullable', 'array'],
            'gambar_destinasi.*'=> ['nullable', 'image', 'max:5120'],
            'tanggal_tersedia'  => ['nullable', 'string'], 
            'harga_2_3'   => ['nullable', 'numeric', 'min:0'],
            'harga_5_6'   => ['nullable', 'numeric', 'min:0'],
            'harga_9_10'  => ['nullable', 'numeric', 'min:0'],
            'harga_13_15' => ['nullable', 'numeric', 'min:0'],
            'harga_18_20' => ['nullable', 'numeric', 'min:0'],
            'harga_30_35' => ['nullable', 'numeric', 'min:0'],
            'harga_50_59' => ['nullable', 'numeric', 'min:0'],
        ];
    }
}
