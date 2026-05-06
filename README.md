Tahap tahap menhggunakan aplikasi:
1. fork repo
2. clone repo
   git clone https://github.com/[USERNAME]/Sikil.git
3. Install dependesi composer
   composer install
4. Siapkan environment variable
   copy file .env.example menjadi .env
   php artisan key:generate
5. Migrasi dan Seed
   hp artisan migrate --seed
6. Jalankan aplikasi
   hp artisan serve



Cara push ke github:
1. git init
2. git add .
3. git commit -m ("nama perubahan")
4. git push -u origin main
