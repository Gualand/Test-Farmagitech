# Test Farmagitech

## Instalasi

- Clone [Repo ini](https://github.com/Gualand/Test-Farmagitech.git).
- Nyalakan webserver dan phpmyadmin.
- import db, yang tersimpan di folder public->lampiran.
- Selanjutnya buka vscode.
- Lakukan instalasi package dengan cara :

```bash
npm install 
```
- Karena disini masih local, maka kita harus menjalankan 2 port (Untuk frontend dan untuk backend/api). Jalankan command ini di 2 terminal yang berbeda.
```bash
php artisan serve
php artisan serve --port=8001 
```
- Masuk ke web, ketikan url :
```bash
localhost:8000/barang
```
