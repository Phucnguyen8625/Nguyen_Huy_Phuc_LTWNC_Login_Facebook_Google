<!--
Họ tên: Nguyễn Huy Phúc
Mã sinh viên: 23810310141
Lớp: D18CNPM2
-->
# Bài thực hành: Đăng nhập bằng Google và Facebook sử dụng Laravel

**Họ tên:** Nguyễn Huy Phúc  
**Mã sinh viên:** 23810310141  
**Lớp:** D18CNPM2  

---

## 1. Mô tả dự án
Hệ thống tích hợp chức năng đăng nhập nhanh thông qua tài khoản bên thứ ba (Google và Facebook). Dự án sử dụng framework Laravel và thư viện Laravel Socialite.

## 2. Công nghệ sử dụng
- **Framework:** Laravel 11.x
- **Thư viện:** Laravel Socialite
- **Ngôn ngữ:** PHP 8.3
- **Cơ sở dữ liệu:** MySQL

## 3. Hướng dẫn cài đặt

### Bước 1: Clone dự án
```bash
git clone https://github.com/Phucnguyen8625/Nguyen_Huy_Phuc_LTWNC_Login_Facebook_Google.git
cd Nguyen_Huy_Phuc_LTWNC_Login_Facebook_Google
```

### Bước 2: Cài đặt các gói phụ thuộc
```bash
composer install
npm install && npm run build
```

### Bước 3: Cấu hình môi trường (`.env`)
Sao chép file mẫu:
```bash
cp .env.example .env
```
Cấu hình Database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_social_login
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Bước 4: Chạy Migration và Tạo Key
```bash
php artisan key:generate
php artisan migrate
```

## 4. Cấu hình Google & Facebook OAuth

### Google OAuth
1. Truy cập [Google Cloud Console](https://console.cloud.google.com/).
2. Tạo dự án mới và thiết lập 'OAuth consent screen'.
3. Tạo 'OAuth 2.0 Client IDs'.
4. Thêm Redirect URI: `http://127.0.0.1:8000/auth/google/callback`.
5. Copy `Client ID` và `Client Secret` vào `.env`:
   ```env
   GOOGLE_CLIENT_ID=your_id
   GOOGLE_CLIENT_SECRET=your_secret
   GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback
   ```

### Facebook OAuth
1. Truy cập [Facebook Developers](https://developers.facebook.com/).
2. Tạo ứng dụng mới loại 'Consumer' hoặc 'None'.
3. Thêm sản phẩm 'Facebook Login'.
4. Cấu hình 'Valid OAuth Redirect URIs': `http://127.0.0.1:8000/auth/facebook/callback`.
5. Copy `App ID` và `App Secret` vào `.env`:
   ```env
   FACEBOOK_CLIENT_ID=your_id
   FACEBOOK_CLIENT_SECRET=your_secret
   FACEBOOK_REDIRECT_URI=http://127.0.0.1:8000/auth/facebook/callback
   ```

## 5. Chạy ứng dụng
```bash
php artisan serve
```
Mở trình duyệt truy cập: `http://127.0.0.1:8000`

---

