# 🚀 Panduan Instalasi Setelah Download 
Harap diperhatikan yooo. kalau ga gitu ga bakal jalan

## 1. Penempatan project
### Xampp
jika kalian menggunakan xampp pastikan project berada di folder **Htdoc** (sudah tau lah ya)

### Laragon
- buka laragon
- klik **root** di bawah kanan
- taruh project kalian disitu

## 2. Install Dependencies Composer
buka project kalian di vsCode. lalu buka terminal dan tulis **command** dibawah ini

```
composer install

```

## 4. Buat File .env
env **tidak akan** push ke repo github. karena .env bersifat rahasia.
kalian hanya akan diberikan **.env.example**. caranya tinggal copas saja

```
cp .env.example .env

```

## 5. Generate App Key
```
php artisan key:generate

```

## 6. Jalankan Migrasi Database
```
php artisan migrate

```

## Selamat Laravel Kalian Sudah Bisa Berjalan
