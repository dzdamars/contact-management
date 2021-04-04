How to use :

1. ketik "composer install" pada directory project.
2. copy .env.example dan ubah menjadi .env.
3. Setting database yang ada di .env.
4. Buat Database kosong baru di phpmyadmin yang namanya sesuai di .env.
5. Jika sudah, ketik "php artisan key:generate".
6. Lalu ketik "php artisan migrate".
7. Terakhir jika sudah semua, maka ketik "php artisan serve".


Rules :

A. Fungsi Admin :
 - Menambahkan contact dan dapat melihat list contact
 - Berhak Memasukkan assignment terhadap contact yang sudah di input
 - Dapat Melihat status assignment nya tapi tidak dapat mengubahnya.
 - Dapat melihat histori

B. Fungsi User :
 - Dapat melihat status assignment dan dapat mengubah statusnya.
 - Dapat melihat history



User Guide :

1. Register dengan akun baru
2. Jika sudah maka akan langsung otomatis masuk ke dashboard sebagai role user
3. Jika role nya ingin diubah menjadi admin, maka harus masuk ke database, lalu masuk ke table "users", dan mengganti 
value "is_admin = 0" menjadi "is_admin = 1" , (Mohon maaf karena saya belum membuat authentikasi untuk adminnya)

4. Jika sudah berada dalam Web, maka yang pertama dilihat adalah Dashboard.

---------------------Masuk dari sisi Admin-------------------------------------------------------------------------------------

5. (Khusus Admin) , Jika ingin membuat Contact baru, klik dropdown "add new contact", lalu akan dialihkan ke 
page add new contact, isi semua data yang diperlukan dan klik submit.
6. (Khusus Admin) , Jika sudah di klik submit maka akan redirect langsung ke page "List Contact", yang dimana disana akan
terlihat contact yang sudah kita tambahkan.

7. (Khusus Admin) , Lalu klik dropdown "assignment" untuk menambahkan meng-assign contact name yang diperlukan.

*note : Di form input assignment akan ada inputan bernama "Assign to agent" -> "Agent List" , untuk memilih isi nya maka diharuskan mendaftarkan setidaknya satu akun dengan role user.
Jika sudah dibuat, maka akun dengan role user akan muncul di bagian isi nya.

8. (Khusus Admin) , Jika form assignment sudah diisi semua, maka sistem akan langsung redirect ke page "List Tasks" , yang dimana disana akan terlihat
assignment yang sudah kita tambahkan beserta statusnya.


---------------------Masuk dari sisi User-------------------------------------------------------------------------------------

9. (Khusus User) , Jika masuk dari sisi user, user hanya akan bisa melihat assignment miliknya pada page "List Tasks", dan user dapat merubah status assignment nya.

10. (Khusus Admin & User) , admin dan user bisa melihat histori yang sudah mereka lakukan terhadap assignment task.
