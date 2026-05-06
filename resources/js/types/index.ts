export * from './auth';
export * from './navigation';
export * from './ui';

// ── Domain Types ─────────────────────────────────────────────────────────────

export type User = {
    id: string
    name: string
    email: string
    role: 'admin' | 'user'
    is_active: boolean
    phone?: string
    address?: string
    created_at?: string
}

export type HargaGroupTier = {
    min_orang: number
    max_orang: number
    harga: number
}

export type Layanan = {
    id: string
    nama_layanan: string
    jenis_layanan: 'open_trip' | 'private_trip' | 'request_trip'
    wilayah: 'domestik' | 'internasional' | null
    harga_mulai: number | null
    harga_format: string
    harga_per_orang: number | null
    kuota_total: number | null
    kuota_tersedia: number | null
    kuota_maksimal: number | null
    tanggal_tersedia: string[] | null
    durasi_hari: number | null
    maks_orang: number | null
    lokasi_tujuan: string
    status: 'aktif' | 'nonaktif'
    gambar_destinasi: string[] | null
    gambar_utama: string | null
    deskripsi: string | null
    slug: string
    // Stored as JSON object with string keys e.g. { '2-3': 1500000, '5-6': 1200000 }
    harga_group: Record<string, number> | null
    // Text fields for forms
    itinerary: any[] | null
    include: string | null
    exclude: string | null
    fasilitas_include: string[] | null
    fasilitas_exclude: string[] | null
    catatan_penting: string | null
    catatan: string | null
}

export type SpecialOffer = {
    id: string
    layanan_id: string | null
    title: string
    slug: string
    description: string | null
    original_price: number
    discounted_price: number
    discount_percentage: number
    formatted_price: string
    formatted_original_price: string
    main_image: string | null
    images: string[] | null
    valid_from: string
    valid_until: string
    is_active: boolean
    is_featured: boolean
    terms_conditions: string | null
    layanan?: Layanan
}

export type Booking = {
    booking_id: string
    booking_number: string
    status: string
    status_label: string
    status_color: string
    total_amount: number
    formatted_total_amount: string
    original_amount: number
    discount_amount: number
    jumlah_peserta: number
    tanggal_keberangkatan: string
    formatted_tanggal_keberangkatan: string
    catatan_khusus: string | null
    customer_info: {
        name: string
        email: string
        phone: string
        address: string
    }
    layanan?: Layanan
    special_offer?: SpecialOffer
    created_at: string
    admin_notes: string | null
    rejection_reason: string | null
    approved_at: string | null
    approved_by?: User
}

export type GuestBooking = {
    guest_booking_id: string
    booking_number: string
    destinasi_dicari: string
    nama_lengkap: string
    email: string
    nomor_telepon: string
    alamat: string | null
    kota: string | null
    provinsi: string | null
    jumlah_peserta: number
    tanggal_keberangkatan_diinginkan: string
    budget_estimasi: number | null
    formatted_budget: string
    status: string
    status_label: string
    is_custom_request: boolean
    catatan_tambahan: string | null
    layanan?: Layanan
    created_at: string
    admin_notes: string | null
}

export type Gallery = {
    id: string
    judul: string
    slug: string
    lokasi_tujuan: string
    deskripsi: string | null
    tanggal_trip: string | null
    images: string[] | null
    cover_image: string | null
    main_image: string | null
    kategori: string | null
    is_active: boolean
}

export type News = {
    id: string
    judul: string
    slug: string
    konten: string
    ringkasan: string | null
    kategori: string | null
    gambar: string | null
    gambar_utama: string | null
    is_published: boolean
    published_at: string | null
    created_at: string
}

export type Review = {
    id: string
    user_id: string | null
    nama_reviewer: string
    rating: number
    komentar: string
    destinasi: string | null
    foto_reviewer: string | null
    is_active: boolean
    order_column: number
}

export type PaginatedData<T> = {
    data: T[]
    links: {
        first: string | null
        last: string | null
        prev: string | null
        next: string | null
    }
    meta: {
        current_page: number
        last_page: number
        per_page: number
        total: number
        from: number | null
        to: number | null
    }
}

export type PageProps = {
    auth: { user: User | null }
    flash: { success?: string | null; error?: string | null }
    [key: string]: unknown
}
