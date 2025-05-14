# flowphp - PHP Framework

![GitHub stars](https://img.shields.io/github/stars/quanghuybest2k2/flowphp) ![License](https://img.shields.io/github/license/quanghuybest2k2/flowphp)

`flowphp` là một framework PHP mã nguồn mở, được thiết kế để giúp bạn xây dựng ứng dụng web một cách nhanh chóng, dễ dàng mở rộng và dễ bảo trì.

---

## 📋 Mục lục

- [🚀 Tính năng chính](#-tính-năng-chính)
- [⚙️ Yêu cầu hệ thống](#️-yêu-cầu-hệ-thống)
- [📦 Cài đặt](#-cài-đặt)
- [🤝 Đóng góp](#-đóng-góp)
- [📄 Giấy phép](#-giấy-phép)

---

## 🚀 Tính năng chính

| Tính năng                            | Trạng thái |
| ------------------------------------ | :--------: |
| Hệ thống route đơn giản và linh hoạt |     ✓      |
| Hỗ trợ MVC (Model-View-Controller)   |     ✓      |
| Hệ thống middleware                  |     ✗      |
| Quản lý session và cookie            |     ✗      |
| Hệ thống validation cơ bản           |     ✗      |
| Cấu hình và tự động load class       |     ✓      |
| Tích hợp với database (MySQL)        |     ✓      |

---

## ⚙️ Yêu cầu hệ thống

- PHP >= 8.0
- Composer
- MySQL (nếu sử dụng database)

---

## 📦 Cài đặt

```bash
# Clone repository
git clone https://github.com/quanghuybest2k2/flowphp.git
cd flowphp

# Cài đặt phụ thuộc (nếu có)
composer install

# Khởi động server phát triển
php -S localhost:8000
```

NOTE: clone `.env.example` to `.env`

Sau khi chạy lệnh trên, truy cập vào `http://localhost:8000` để xem ứng dụng.

---

## 🤝 Đóng góp

Rất hoan nghênh mọi đóng góp để cải thiện `flowphp`:

1. Fork repository này
2. Tạo branch cho tính năng mới (`git checkout -b feature/MyFeature`)
3. Commits các thay đổi của bạn (`git commit -m 'Add new feature'`)
4. Đẩy lên branch của bạn (`git push origin feature/MyFeature`)
5. Tạo Pull Request

---

## 📄 Giấy phép

Dự án này được cấp phép theo giấy phép [MIT](./LICENSE).
