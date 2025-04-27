# ⚠ PERHATIAN ⚠
## MAAF, SEBELUM MELANJUTKAN KE PROSES INSTALLASI, SAYA INGIN MEMBERIKAN KONFIRMASI DULU BAHWA, SAYA TELAH MELAMAR DI SMARTLINK DI DUA PLATFORM, PERTAMA VIA EMAIL (career@smartlink.id) DAN YANG KEDUA VIA APLIKASI GLINTS (Fullstack). KUSUS UNTUK PLATFORM GLINTS, SAYA RASA SAYA DULU LUPA / KURANG FOKUS SAAT MEMBACA TEKNOLOGI APA YANG AKAN DIGUNAKAN, KARENA EXPERTISE SAYA PADA FRAMEWORK JAVASCRIPT (Backend & Frondend). JADI PADA INTINYA SAYA MAU MEMBERIKAN KONFIRMASI BAHWA, SAYA MASIH BELUM MEMILIKI PENGALAMAN PROFESIONAL (KERJA) DENGAN LARAVEL, TETAPI KALAU SAYA DITANYA APAKAH BISA MENGGUNAKANNYA ? SAYA BISA. MUNGKIN ITU SAJA YANG MAU SAYA SAMPAIKAN KURANG LEBIHNYA SAYA MOHON MAAF 🙏🏼 (maaf pake uppercase word).

sebelumnya saya mau ngejelasin secara singkat untuk flow/tech aplikasi ini. singkatnya ini adalah aplikasi todo list, 
yang mana saya mengikuti intruksi dari [Dokument ini](https://drive.google.com/file/d/19ZCDAMKELm4Tgm7QWTgHoNbY-3FzdElP/view?usp=sharing). saya sudah menyiapkan seeder akun untuk super admin yang bisa mengatur permission disetiap user. 

      email : test@smartlink.test
      password: 12345678
Tidak ada proses register untuk menambah user baru didalam aplikasi ini, penambahan user bisa dilakukan oleh super admin. Untuk database saya menggunakan mysql 
[(XAMPP)](https://www.apachefriends.org/download.html) dengan version v3.3.0.


![1233333](https://github.com/user-attachments/assets/b177d8e3-dabe-4e56-9e39-2bb11dc22980)


# Cara Menjalankan Aplikasi
-   buat dulu database pada mysql dengan nama "**task-management-smartlink**". berikut environment (sudah saya include ke repositorinya & tidak perlu setting tambahan lagi)

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=task-management-smartlink
        DB_USERNAME=root
        DB_PASSWORD=

-   lalu jalankan perintah berikut untuk proses installasi dan juga migrasi.

        composer run nurhamsah-smartlink

-   jika proses diatas berhasil, jalankan perintah berikut (satu per satu) untuk generate permission dan juga SET user **test@smartlink.test** sebagai super admin:
        
        php artisan shield:generate

        php artisan shield:super-admin

-   sekarang aplikasi sudah bisa dijalankan dengan perintah : 

        php artisan serve

**NOTE: expetasi server akan berjalan di http://localhost:8000/smart**

# Thats It ☕
jika ada pertanyaan bisa hubungi saya via whatsapp [Nurhamsah](https://wa.me/6281213221343)




.
