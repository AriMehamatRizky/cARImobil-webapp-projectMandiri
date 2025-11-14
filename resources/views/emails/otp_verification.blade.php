<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kode Verifikasi</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { width: 90%; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .otp-code { font-size: 32px; font-weight: bold; color: #F47B20; letter-spacing: 2px; margin: 20px 0; }
        .note { font-size: 0.9em; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Selamat Datang di cARImobil!</h2>
        <p>Satu langkah lagi untuk mengaktifkan akun Anda. Silakan gunakan kode verifikasi di bawah ini:</p>

        <div classclass="otp-code">
            {{ $otpCode }}
        </div>

        <p class="note">Kode ini akan kedaluwarsa dalam 10 menit. Jangan berikan kode ini kepada siapa pun.</p>
        <p>Terima kasih,<br>Tim cARImobil</p>
    </div>
</body>
</html>