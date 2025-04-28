# ⚠ PERHATIAN ⚠
## MAAF, SEBELUM MELANJUTKAN KE PROSES INSTALLASI, SAYA INGIN MEMBERIKAN KONFIRMASI DULU BAHWA, SAYA TELAH MELAMAR DI SMARTLINK DI DUA PLATFORM, PERTAMA VIA EMAIL (career@smartlink.id) DAN YANG KEDUA VIA APLIKASI GLINTS (Fullstack). KUSUS UNTUK PLATFORM GLINTS, SAYA RASA SAYA DULU LUPA / KURANG FOKUS SAAT MEMBACA TEKNOLOGI APA YANG AKAN DIGUNAKAN, KARENA EXPERTISE SAYA PADA FRAMEWORK JAVASCRIPT (Backend & Frondend). JADI PADA INTINYA SAYA MAU MEMBERIKAN KONFIRMASI BAHWA, SAYA MASIH BELUM MEMILIKI PENGALAMAN PROFESIONAL (KERJA) DENGAN LARAVEL, TETAPI KALAU SAYA DITANYA APAKAH BISA MENGGUNAKANNYA ? SAYA BISA. MUNGKIN ITU SAJA YANG MAU SAYA SAMPAIKAN KURANG LEBIHNYA SAYA MOHON MAAF 🙏🏼 (maaf pake uppercase word).

sebelumnya saya mau ngejelasin secara singkat untuk flow/tech aplikasi ini. singkatnya ini adalah aplikasi todo list, 
yang mana saya mengikuti intruksi dari [Dokument ini](https://drive.google.com/file/d/19ZCDAMKELm4Tgm7QWTgHoNbY-3FzdElP/view?usp=sharing). saya sudah menyiapkan seeder akun untuk super admin yang bisa mengatur permission disetiap user. 

      email : test@smartlink.test
      password: 12345678
Tidak ada proses register untuk menambah user baru didalam aplikasi ini, penambahan user bisa dilakukan oleh super admin. Untuk database saya menggunakan mysql 
[(XAMPP)](https://www.apachefriends.org/download.html) dengan version v3.3.0.

# Cara Menjalankan Aplikasi
![1233333](https://github.com/user-attachments/assets/b177d8e3-dabe-4e56-9e39-2bb11dc22980)
-   pastikan server mysql dan apache jalan sesuai dengan gambar diatas lalu buat dulu database pada mysql dengan nama "**task-management-smartlink**". berikut database dan environment (sudah saya include ke repositorinya & tidak perlu setting tambahan lagi).
![w](https://github.com/user-attachments/assets/0476fd30-02c8-41b7-b6e4-75aa0938f325)


        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=task-management-smartlink
        DB_USERNAME=root
        DB_PASSWORD=

-   lalu jalankan perintah berikut untuk proses installasi dan juga migrasi (biasanya akan memakan waktu cukup lama, tunggu sampai terminal exit sendiri.).

        composer run nurhamsah-smartlink

-   jika proses diatas berhasil, jalankan perintah dibawah ini yang nantinya akan masukkan nama panel (ketikkan kata smart lalu enter) untuk generate permission:
        
        php artisan shield:generate
![3ed](https://github.com/user-attachments/assets/28ce3878-21e3-4316-96d8-5500f99a12ed)

-   dan selanjutnya jalankan perintah berikut untuk SET user **test@smartlink.test** sebagai super admin:

        php artisan shield:super-admin
![wewefwefwef](https://github.com/user-attachments/assets/c18a7da3-b8d8-4621-a645-e8cc1d6f305a)


-   sekarang aplikasi sudah bisa dijalankan dengan perintah : 

        php artisan serve

**NOTE: expetasi server akan berjalan di http://localhost:8000/smart**

### By default permission super admin akan terbatas. Edit role super admin dengan mengaktifkan semua fitur dengan click switch seperti gambar dibawah ini agar semua permission terpilih. Simpan perubahan lalu coba refresh page.
![111](https://github.com/user-attachments/assets/b502929c-e8f3-494a-ab1b-356a509ea936)


jika ada pertanyaan / kendala bisa hubungi saya via whatsapp [Nurhamsah](https://wa.me/6281213221343)




## Sekian dari saya kurang lebihnya sekali lagi saya mohon maaf. Terima kasih 🙏🏼
