<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Akun Anda</title>
</head>

<body style="background-color: #f3f4f6; font-family: Arial, sans-serif; color: #333; padding: 20px;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f3f4f6; padding: 20px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" max-width="480px" bgcolor="#ffffff" cellspacing="0" cellpadding="20"
                    style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">

                    <!-- Header -->
                    <tr>
                        <td>
                            <h2 style="color: #1e40af; font-size: 22px; margin-bottom: 10px;">📩 Verifikasi Akun Anda</h2>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="color: #4b5563; font-size: 16px;">
                            <p>Halo, <strong>{{ $user->username }}</strong> 👋</p>
                            <p>Terima kasih telah mendaftar di Structura!</p>
                            <p>Klik tombol di bawah ini untuk memverifikasi akun Anda.</p>
                        </td>
                    </tr>

                    <!-- Button -->
                    <tr>
                        <td>
                            <a href="{{ $verificationUrl }}"
                                style="background-color: #1e40af; color: #ffffff; padding: 12px 24px;
                                border-radius: 8px; font-size: 16px; font-weight: bold;
                                text-decoration: none; display: inline-block; margin-top: 10px;">
                                Verifikasi Akun
                            </a>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="color: #9ca3af; font-size: 14px; padding-top: 20px;">
                            <p>Jika Anda tidak mendaftar, abaikan email ini.</p>
                            <p style="margin-top: 5px;">© 2025 Structura. All rights reserved.</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>
