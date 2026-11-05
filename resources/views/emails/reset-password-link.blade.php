<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="margin:0; padding:0; background:#f4f4f5; font-family: Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding:30px 0;">
        <tr>
            <td align="center">
                <table width="480" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:10px; overflow:hidden; border:1px solid #e5e7eb;">
                    <tr>
                        <td style="background:#2563eb; padding:20px 30px;">
                            <span style="color:#ffffff; font-size:16px; font-weight:bold;">MA Az-Zahra Parongpong</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:30px;">
                            <p style="margin:0 0 10px; color:#111827; font-size:15px;">
                                Halo, <strong>{{ $userName }}</strong>
                            </p>
                            <p style="margin:0 0 20px; color:#4b5563; font-size:14px; line-height:1.6;">
                                Permintaan reset password Anda pada Sistem Informasi MA Az-Zahra telah
                                <strong>disetujui oleh Admin</strong>. Klik tombol di bawah ini untuk membuat password baru:
                            </p>

                            <div style="text-align:center; margin:25px 0;">
                                <a href="{{ $resetLink }}" style="display:inline-block; background:#2563eb; color:#ffffff; font-size:14px; font-weight:bold; text-decoration:none; padding:12px 28px; border-radius:8px;">
                                    Buat Password Baru
                                </a>
                            </div>

                            <p style="margin:0 0 6px; color:#6b7280; font-size:13px;">
                                Jika tombol tidak berfungsi, salin dan buka tautan berikut di browser Anda:
                            </p>
                            <p style="margin:0 0 20px; color:#2563eb; font-size:12px; word-break:break-all;">
                                {{ $resetLink }}
                            </p>
                            <p style="margin:0; color:#6b7280; font-size:13px;">
                                Jika Anda tidak merasa melakukan permintaan ini, abaikan email ini.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#f9fafb; padding:15px 30px; text-align:center;">
                            <span style="color:#9ca3af; font-size:11px;">
                                Email otomatis dari Sistem Informasi MA Az-Zahra Parongpong
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>