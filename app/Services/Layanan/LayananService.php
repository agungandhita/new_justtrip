<?php

namespace App\Services\Layanan;

use App\DTOs\Layanan\CreateLayananDTO;
use App\DTOs\Layanan\UpdateLayananDTO;
use App\Enums\LayananStatus;
use App\Models\Trip\Layanan;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class LayananService implements LayananInterface
{
    public function getAll(array $filters): LengthAwarePaginator
    {
        return Layanan::query()
            ->when(
                isset($filters['status']) && $filters['status'],
                fn ($q) => $q->where('status', $filters['status'])
            )
            ->when(
                isset($filters['jenis_layanan']) && $filters['jenis_layanan'],
                fn ($q) => $q->where('jenis_layanan', $filters['jenis_layanan'])
            )
            ->when(
                isset($filters['search']) && $filters['search'],
                fn ($q) => $q->whereLike('nama_layanan', $filters['search'])
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();
    }

    public function findById(string $id): Layanan
    {
        return Layanan::findOrFail($id);
    }

    public function findBySlug(string $slug): Layanan
    {
        return Layanan::where('slug', $slug)->firstOrFail();
    }

    public function getActiveList(): Collection
    {
        return Layanan::aktif()->orderBy('nama_layanan')->get();
    }

    public function create(CreateLayananDTO $dto): Layanan
    {
        $data = $this->prepareDataFromDTO($dto);

        if ($dto->gambar_utama) {
            $data['gambar_utama'] = '/storage/' . $dto->gambar_utama->store('layanan', 'public');
        }

        if (!empty($dto->gambar_destinasi)) {
            $paths = [];
            foreach ($dto->gambar_destinasi as $file) {
                if ($file->isValid()) {
                    $paths[] = '/storage/' . $file->store('layanan', 'public');
                }
            }
            $data['gambar_destinasi'] = $paths;
        } else {
            $data['gambar_destinasi'] = [];
        }

        return Layanan::create($data);
    }

    public function update(string $id, UpdateLayananDTO $dto): Layanan
    {
        $layanan = $this->findById($id);
        $data = $this->prepareDataFromDTO($dto);

        if ($dto->gambar_utama) {
            if ($layanan->gambar_utama) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $layanan->gambar_utama));
            }
            $data['gambar_utama'] = '/storage/' . $dto->gambar_utama->store('layanan', 'public');
        }

        if (!empty($dto->gambar_destinasi)) {
            $paths = [];
            foreach ($dto->gambar_destinasi as $file) {
                if ($file->isValid()) {
                    $paths[] = '/storage/' . $file->store('layanan', 'public');
                }
            }
            // Append back to the current value
            $existing = $layanan->gambar_destinasi ?? [];
            $data['gambar_destinasi'] = array_merge($existing, $paths);
        }

        $layanan->update($data);

        return $layanan->fresh();
    }

    private function prepareDataFromDTO(CreateLayananDTO|UpdateLayananDTO $dto): array
    {
        return [
            'nama_layanan'      => $dto->nama_layanan,
            'jenis_layanan'     => $dto->jenis_layanan,
            'wilayah'           => $dto->wilayah,
            'lokasi_tujuan'     => $dto->lokasi_tujuan,
            'status'            => $dto->status,
            'deskripsi'         => $dto->deskripsi,
            'durasi_hari'       => $dto->durasi_hari,
            'harga_per_orang'   => $dto->harga_per_orang,
            'kuota_total'       => $dto->kuota_total,
            'kuota_tersedia'    => $dto->kuota_tersedia,
            'tanggal_tersedia'  => $dto->tanggal_tersedia,
            'harga_group'       => $dto->harga_group,
            'itinerary'         => $dto->itinerary,
            'fasilitas_include' => $dto->fasilitas_include,
            'fasilitas_exclude' => $dto->fasilitas_exclude,
            'catatan'           => $dto->catatan,
        ];
    }

    public function delete(string $id): void
    {
        $this->findById($id)->delete();
    }

    public function toggleStatus(string $id): Layanan
    {
        $layanan = $this->findById($id);
        $layanan->update([
            'status' => $layanan->status === LayananStatus::Aktif
                ? LayananStatus::Nonaktif
                : LayananStatus::Aktif,
        ]);

        return $layanan->fresh();
    }
}
