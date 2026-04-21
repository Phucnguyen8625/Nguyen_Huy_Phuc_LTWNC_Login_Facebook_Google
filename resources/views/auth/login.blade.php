<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | Nguyễn Huy Phúc</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --google: #db4437;
            --facebook: #1877f2;
            --bg: #0f172a;
        }
        body {
            font-family: 'Outfit', sans-serif;
            background: radial-gradient(circle at top right, #1e293b, #0f172a);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #f8fafc;
        }
        .card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            width: 100%;
            max-width: 420px;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            animation: fadeIn 0.6s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h2 { font-weight: 600; margin-bottom: 8px; color: #fff; font-size: 1.8rem; }
        p.subtitle { color: #94a3b8; font-size: 0.95rem; margin-bottom: 30px; }
        
        .info-box {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 18px;
            margin-bottom: 25px;
            text-align: left;
            border-left: 5px solid var(--primary);
        }
        .info-box p { margin: 6px 0; font-size: 0.9rem; color: #cbd5e1; }
        .info-box strong { color: #fff; font-weight: 600; }

        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            margin: 15px 0;
            padding: 15px;
            border-radius: 14px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }
        .google { background: var(--google); box-shadow: 0 4px 15px rgba(219, 68, 55, 0.3); }
        .facebook { background: var(--facebook); box-shadow: 0 4px 15px rgba(24, 119, 242, 0.3); }
        .btn:hover { transform: translateY(-3px); filter: brightness(1.1); box-shadow: 0 10px 25px rgba(0,0,0,0.4); }
        .btn:active { transform: translateY(0); }

        .alert {
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 0.9rem;
            animation: shake 0.4s ease-in-out;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        .success { background: rgba(34, 197, 94, 0.2); color: #4ade80; border: 1px solid rgba(34, 197, 94, 0.3); }
        .error { background: rgba(239, 68, 68, 0.2); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); }

        svg { filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2)); }
    </style>
</head>
<body>
    <div class="card">
        <h2>Đăng nhập Hệ thống</h2>
        <p class="subtitle">Dự án Thực hành Lập trình Web Nâng cao</p>

        <div class="info-box">
            <p><strong>Họ tên:</strong> Nguyễn Huy Phúc</p>
            <p><strong>Mã SV:</strong> 23810310141</p>
            <p><strong>Lớp:</strong> D18CNPM2</p>
        </div>

        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        <a class="btn google" href="{{ route('social.redirect', 'google') }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12.48 10.92v3.28h7.84c-.24 1.84-1.92 5.36-7.84 5.36-5.12 0-9.28-4.24-9.28-9.52s4.16-9.52 9.28-9.52c2.92 0 4.88 1.24 6 2.32l2.6-2.52C19.24 1.84 16.12 0 12.48 0 5.84 0 0 5.36 0 12s5.84 12 12.48 12c6.92 0 11.52-4.88 11.52-11.72 0-.8-.08-1.4-.24-2.04h-11.28z"/></svg>
            Đăng nhập với Google
        </a>

        <a class="btn facebook" href="{{ route('social.redirect', 'facebook') }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            Đăng nhập với Facebook
        </a>
    </div>
</body>
</html>