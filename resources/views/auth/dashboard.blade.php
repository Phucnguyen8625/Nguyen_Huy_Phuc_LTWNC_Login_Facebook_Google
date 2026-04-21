<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | {{ auth()->user()->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --bg: #0f172a;
        }
        body {
            font-family: 'Outfit', sans-serif;
            background: #0f172a;
            color: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(12px);
            width: 100%;
            max-width: 500px;
            padding: 40px;
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            animation: slideUp 0.6s ease-out;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .avatar-container {
            position: relative;
            display: inline-block;
            margin-bottom: 25px;
        }
        img.avatar {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--primary);
            padding: 5px;
            background: #1e293b;
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.4);
        }
        .provider-badge {
            position: absolute;
            bottom: 8px;
            right: 8px;
            background: var(--primary);
            color: white;
            font-size: 0.75rem;
            padding: 5px 12px;
            border-radius: 20px;
            text-transform: uppercase;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            border: 2px solid #1e293b;
        }
        h2 { font-weight: 600; margin-bottom: 35px; font-size: 1.6rem; color: #fff; }
        
        .info-grid {
            display: grid;
            gap: 18px;
            text-align: left;
            margin-bottom: 35px;
        }
        .info-item {
            background: rgba(255, 255, 255, 0.04);
            padding: 18px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
        }
        .info-item:hover { background: rgba(255, 255, 255, 0.07); transform: scale(1.02); }
        .info-label { color: #94a3b8; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600; }
        .info-value { color: #fff; font-weight: 500; font-size: 1.1rem; margin-top: 6px; }

        .btn-logout {
            width: 100%;
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            padding: 16px;
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 1rem;
        }
        .btn-logout:hover { background: #ef4444; color: white; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3); }

        .student-footer {
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.95rem;
            color: #94a3b8;
            line-height: 1.6;
        }
        .student-footer strong { color: var(--primary); font-weight: 600; }
        
        .alert {
            background: rgba(34, 197, 94, 0.15);
            color: #4ade80;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 0.9rem;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
    </style>
</head>
<body>
    <div class="card">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <h2>Thông tin tài khoản</h2>

        <div class="avatar-container">
            @if(auth()->user()->avatar)
                <img src="{{ auth()->user()->avatar }}" alt="Avatar" class="avatar">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6366f1&color=fff&size=128" alt="Avatar" class="avatar">
            @endif
            <span class="provider-badge">{{ auth()->user()->provider }}</span>
        </div>

        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Họ tên tài khoản</div>
                <div class="info-value">{{ auth()->user()->name }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Email đăng ký</div>
                <div class="info-value">{{ auth()->user()->email }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Mã sinh viên hệ thống</div>
                <div class="info-value">{{ auth()->user()->student_id }}</div>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Đăng xuất</button>
        </form>

        <div class="student-footer">
            Dự án Thực hành &copy; 2026<br>
            Sinh viên: <strong>Nguyễn Huy Phúc</strong><br>
            MSV: <strong>23810310141</strong> | Lớp: <strong>D18CNPM2</strong>
        </div>
    </div>
</body>
</html>