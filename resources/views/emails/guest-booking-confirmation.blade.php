<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Permintaan - JustTrip</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #7c3aed, #6d28d9); padding: 30px; text-align: center; }
        .header h1 { color: #fff; margin: 0; font-size: 24px; }
        .body { padding: 30px; }
        .booking-number { font-size: 22px; font-weight: bold; color: #7c3aed; text-align: center; letter-spacing: 2px; margin-bottom: 20px; }
        .detail-row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e2e8f0; font-size: 14px; }
        .detail-label { color: #64748b; }
        .detail-value { color: #1e293b; font-weight: 600; }
        .wa-button { display: block; background: #25d366; color: #fff; text-decoration: none; text-align: center; padding: 14px 20px; border-radius: 8px; font-weight: bold; font-size: 16px; margin: 25px 0; }
        .info-box { background: #faf5ff; border-left: 4px solid #7c3aed; padding: 15px; border-radius: 4px; margin: 20px 0; }
        .footer { background: #f8fafc; padding: 20px; text-align: center; color: #94a3b8; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌴 JustTrip</h1>
            <p style="color: #ddd6fe;">Permintaan Trip Anda Sudah Diterima!</p>
        </div>
        <div class="body">
            <p style="font-size:18px;font-weight:bold;color:#1e293b;">Halo <strong>{{ $guestBooking->nama_lengkap }}</strong>! 👋</p>
            <p style="color: #64748b;">Permintaan trip Anda telah kami terima. Nomor permintaan Anda:</p>

            <div class="booking-number">{{ $guestBooking->booking_number }}</div>

            <div class="detail-row"><span class="detail-label">Destinasi</span><span class="detail-value">{{ $guestBooking->destinasi_dicari }}</span></div>
            <div class="detail-row"><span class="detail-label">Jumlah Peserta</span><span class="detail-value">{{ $guestBooking->jumlah_peserta }} orang</span></div>
            <div class="detail-row"><span class="detail-label">Tanggal yang Diinginkan</span><span class="detail-value">{{ $guestBooking->tanggal_keberangkatan_diinginkan->format('d F Y') }}</span></div>
            @if($guestBooking->budget_estimasi)
            <div class="detail-row"><span class="detail-label">Budget Estimasi</span><span class="detail-value">{{ $guestBooking->formatted_budget }}</span></div>
            @endif

            <div class="info-box">
                <strong>📞 Langkah Selanjutnya</strong>
                <p style="margin: 8px 0 0; color: #64748b;">Tim kami akan menghubungi Anda dalam <strong>1x24 jam</strong> untuk mendiskusikan paket terbaik sesuai kebutuhan Anda.</p>
            </div>

            <a href="https://wa.me/6282266478147?text={{ urlencode('Halo JustTrip, saya baru mengajukan permintaan trip dengan nomor ' . $guestBooking->booking_number . '. Mohon konfirmasinya.') }}" class="wa-button">
                💬 Langsung Hubungi via WhatsApp
            </a>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} JustTrip. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
