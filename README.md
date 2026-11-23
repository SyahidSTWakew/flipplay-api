<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# FlipPlay API - Modul 4

## Deskripsi
FlipPlay merupakan prototype REST API berbasis Laravel 12 untuk mengelola media seperti anime dan manga serta koleksi media pengguna.

## Teknologi
- Laravel 12
- PHP 8.2+
- MySQL
- Eloquent ORM
- Postman

## Fitur
- CRUD Media
- Relasi Many-to-Many antara User dan Media
- Form Request Validation
- API Resource
- Custom Action koleksi pengguna
- Pagination

## Database
- users
- media
- media_user

## Endpoint
| Method | Endpoint | Fungsi |
|---|---|---|
| GET | /api/media | Daftar media |
| GET | /api/media/{id} | Detail media |
| POST | /api/media | Tambah media |
| PATCH | /api/media/{id} | Update media |
| DELETE | /api/media/{id} | Hapus media |
| GET | /api/users/{user}/collection | Lihat koleksi |
| POST | /api/users/{user}/collection/{media} | Tambah koleksi |
| DELETE | /api/users/{user}/collection/{media} | Hapus koleksi |

## Instalasi
1. Clone repository.
2. Jalankan `composer install`.
3. Salin `.env.example` menjadi `.env`.
4. Atur koneksi database MySQL.
5. Jalankan `php artisan key:generate`.
6. Jalankan `php artisan migrate`.
7. Jalankan `php artisan serve`.

## Pengujian
Pengujian API dilakukan menggunakan Postman. File Collection tersedia di folder docs.

## Developer
Nama: Isi nama kamu
Mata Kuliah: Pemrograman Berorientasi Objek / Modul 4
