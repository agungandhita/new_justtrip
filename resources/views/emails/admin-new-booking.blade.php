<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking Baru - Admin JustTrip</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: #dc2626; padding: 20px 30px; }
        .header h1 { color: #fff; margin: 0; font-size: 20px; }
        .body { padding: 30px; }
        .booking-number { font-size: 24px; font-weight: bold; color: #dc2626; margin-bottom: 20px; }
        .section { margin: 20px 0; }
        .section-title { font-size: 14px; font-weight: bold; color: #64748b; text-transform: uppercase; letter-spacing: 1px; border-bottom: 2px solid #e2e8f0; padding-bottom: 8px; margin-bottom: 12px; }
        .detail-row { display: flex; gap: 10px; padding: 6px 0; border-bottom: 1px solid #f1f5f9; font-size: 14px; }
        .detail-label { color: #64748b; min-width: 160px; flex-shrink: 0; }
        .detail-value { color: #1e293b; font-weight: 600; }
        .action-button { display: inline-block; background: #1d4ed8; color: #fff; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-weight: bold; margin-top: 20px; }
        .footer { background: #f8fafc; padding: 15px 30px; text-align: center; color: #94a3b8; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔔 Booking Baru Masuk!</h1>
        </div>
        <div class="body">
            <div class="booking-number">{{ $booking->booking_number }}</div>

            <div class="section">
                <div class="section-title">Data Pelanggan</div>
                <div class="detail-row"><span class="detail-label">Nama</span><span class="detail-value">{{ $booking->customer_info['name'] }}</span></div>
                <div class="detail-row"><span class="detail-label">Email</span><span class="detail-value">{{ $booking->customer_info['email'] }}</span></div>
                <div class="detail-row"><span class="detail-label">Telepon</span><span class="detail-value">{{ $booking->customer_info['phone'] }}</span></div>
                <div class="detail-row"><span class="detail-label">Alamat</span><span class="detail-value">{{ $booking->customer_info['address'] }}</span></div>
            </div>

            <div class="section">
                <div class="section-title">Detail Booking</div>
                <div class="detail-row"><span class="detail-label">Paket</span><span class="detail-value">{{ $booking->layanan?->nama_layanan ?? '-' }}</span></div>
                <div class="detail-row"><span class="detail-label">Jumlah Peserta</span><span class="detail-value">{{ $booking->jumlah_peserta }} orang</span></div>
                <div class="detail-row"><span class="detail-label">Tanggal Berangkat</span><span class="detail-value">{{ $booking->tanggal_keberangkatan->format('d F Y') }}</span></div>
                <div class="detail-row"><span class="detail-label">Total</span><span class="detail-value">{{ $booking->formatted_total_amount }}</span></div>
                @if($booking->catatan_khusus)
                <div class="detail-row"><span class="detail-label">Catatan</span><span class="detail-value">{{ $booking->catatan_khusus }}</span></div>
                @endif
            </div>

            <a href="{{ config('app.url') }}/admin/bookings/{{ $booking->booking_id }}" class="action-button">
                Lihat Detail di Admin Panel →
            </a>
        </div>
        <div class="footer">
            <p>Email ini dikirim otomatis oleh sistem JustTrip.</p>
        </div>
    </div>
</body>
</html>
