<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Permintaan Trip Baru - Admin JustTrip</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: #7c3aed; padding: 20px 30px; }
        .header h1 { color: #fff; margin: 0; font-size: 20px; }
        .body { padding: 30px; }
        .section { margin: 20px 0; }
        .section-title { font-size: 13px; font-weight: bold; color: #64748b; text-transform: uppercase; border-bottom: 2px solid #e2e8f0; padding-bottom: 8px; margin-bottom: 12px; }
        .detail-row { display: flex; gap: 10px; padding: 6px 0; border-bottom: 1px solid #f1f5f9; font-size: 14px; }
        .detail-label { color: #64748b; min-width: 160px; flex-shrink: 0; }
        .detail-value { color: #1e293b; font-weight: 600; }
        .badge { display: inline-block; padding: 2px 8px; border-radius: 9999px; font-size: 12px; }
        .badge-custom { background: #fef9c3; color: #ca8a04; }
        .badge-package { background: #dbeafe; color: #1d4ed8; }
        .action-button { display: inline-block; background: #7c3aed; color: #fff; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-weight: bold; margin-top: 20px; }
        .footer { background: #f8fafc; padding: 15px 30px; text-align: center; color: #94a3b8; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔔 Permintaan Trip Baru!
                @if($guestBooking->is_custom_request)
                    <span class="badge badge-custom" style="font-size:14px;">Custom</span>
                @else
                    <span class="badge badge-package" style="font-size:14px;">Paket</span>
                @endif
            </h1>
        </div>
        <div class="body">
            <div class="section">
                <div class="section-title">Data Pemohon</div>
                <div class="detail-row"><span class="detail-label">Nama</span><span class="detail-value">{{ $guestBooking->nama_lengkap }}</span></div>
                <div class="detail-row"><span class="detail-label">Email</span><span class="detail-value">{{ $guestBooking->email }}</span></div>
                <div class="detail-row"><span class="detail-label">Telepon</span><span class="detail-value">{{ $guestBooking->nomor_telepon }}</span></div>
                <div class="detail-row"><span class="detail-label">Kota/Provinsi</span><span class="detail-value">{{ $guestBooking->kota }}, {{ $guestBooking->provinsi }}</span></div>
            </div>

            <div class="section">
                <div class="section-title">Detail Permintaan</div>
                <div class="detail-row"><span class="detail-label">No. Permintaan</span><span class="detail-value">{{ $guestBooking->booking_number }}</span></div>
                <div class="detail-row"><span class="detail-label">Destinasi</span><span class="detail-value">{{ $guestBooking->destinasi_dicari }}</span></div>
                <div class="detail-row"><span class="detail-label">Jumlah Peserta</span><span class="detail-value">{{ $guestBooking->jumlah_peserta }} orang</span></div>
                <div class="detail-row"><span class="detail-label">Tanggal Diinginkan</span><span class="detail-value">{{ $guestBooking->tanggal_keberangkatan_diinginkan->format('d F Y') }}</span></div>
                @if($guestBooking->budget_estimasi)
                <div class="detail-row"><span class="detail-label">Budget Estimasi</span><span class="detail-value">{{ $guestBooking->formatted_budget }}</span></div>
                @endif
                @if($guestBooking->catatan_tambahan)
                <div class="detail-row"><span class="detail-label">Catatan</span><span class="detail-value">{{ $guestBooking->catatan_tambahan }}</span></div>
                @endif
            </div>

            <a href="{{ config('app.url') }}/admin/guest-bookings/{{ $guestBooking->guest_booking_id }}" class="action-button">
                Lihat Detail di Admin Panel →
            </a>
        </div>
        <div class="footer">
            <p>Email ini dikirim otomatis oleh sistem JustTrip.</p>
        </div>
    </div>
</body>
</html>
