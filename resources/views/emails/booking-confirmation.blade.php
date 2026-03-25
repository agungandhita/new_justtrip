<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Booking - JustTrip</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #1d4ed8, #2563eb); padding: 30px; text-align: center; }
        .header h1 { color: #fff; margin: 0; font-size: 24px; }
        .header p { color: #bfdbfe; margin: 5px 0 0; }
        .body { padding: 30px; }
        .greeting { font-size: 18px; font-weight: bold; color: #1e293b; margin-bottom: 10px; }
        .booking-card { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; margin: 20px 0; }
        .booking-number { font-size: 22px; font-weight: bold; color: #1d4ed8; text-align: center; letter-spacing: 2px; margin-bottom: 15px; }
        .detail-row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e2e8f0; }
        .detail-row:last-child { border-bottom: none; }
        .detail-label { color: #64748b; font-size: 14px; }
        .detail-value { color: #1e293b; font-weight: 600; font-size: 14px; }
        .total-row { background: #eff6ff; padding: 12px; border-radius: 6px; margin-top: 15px; }
        .total-label { color: #1d4ed8; font-weight: bold; }
        .total-value { color: #1d4ed8; font-weight: bold; font-size: 18px; }
        .wa-button { display: block; background: #25d366; color: #fff; text-decoration: none; text-align: center; padding: 14px 20px; border-radius: 8px; font-weight: bold; font-size: 16px; margin: 25px 0; }
        .info-box { background: #fef9c3; border-left: 4px solid #eab308; padding: 15px; border-radius: 4px; margin: 20px 0; }
        .footer { background: #f8fafc; padding: 20px; text-align: center; color: #94a3b8; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌴 JustTrip</h1>
            <p>#TripGagalMoveOn</p>
        </div>
        <div class="body">
            <p class="greeting">Terima kasih sudah booking di JustTrip! 🎉</p>
            <p style="color: #64748b;">Hai <strong>{{ $booking->customer_info['name'] }}</strong>, pesanan Anda telah kami terima dan sedang menunggu konfirmasi dari tim kami.</p>

            <div class="booking-card">
                <div class="booking-number">{{ $booking->booking_number }}</div>
                <div class="detail-row">
                    <span class="detail-label">Paket Wisata</span>
                    <span class="detail-value">{{ $booking->layanan?->nama_layanan ?? '-' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Jumlah Peserta</span>
                    <span class="detail-value">{{ $booking->jumlah_peserta }} orang</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Tanggal Keberangkatan</span>
                    <span class="detail-value">{{ $booking->tanggal_keberangkatan->format('d F Y') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status</span>
                    <span class="detail-value">Menunggu Konfirmasi</span>
                </div>
                <div class="total-row detail-row">
                    <span class="total-label">Total Pembayaran</span>
                    <span class="total-value">{{ $booking->formatted_total_amount }}</span>
                </div>
            </div>

            <div class="info-box">
                <strong>⚠️ Informasi Penting:</strong>
                <p style="margin: 8px 0 0;">Tim kami akan menghubungi Anda dalam <strong>1x24 jam</strong> untuk konfirmasi lebih lanjut. Untuk mempercepat, Anda bisa langsung menghubungi kami via WhatsApp:</p>
            </div>

            <a href="https://wa.me/6282266478147?text={{ urlencode('Halo JustTrip, saya baru melakukan booking dengan nomor ' . $booking->booking_number . '. Mohon konfirmasinya.') }}" class="wa-button">
                💬 Hubungi via WhatsApp
            </a>

            <p style="color: #64748b; font-size: 14px;">Jika ada pertanyaan, jangan ragu menghubungi kami.</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} JustTrip. All rights reserved.</p>
            <p>justtrip20@gmail.com | +62 822-6647-8147</p>
        </div>
    </div>
</body>
</html>
