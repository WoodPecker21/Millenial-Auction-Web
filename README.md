## Projek UAS Millenial Auction 2023

Tema Website : Lelang <br>
Website ini dibuat untuk tugas besar mata kuliah Website Programming. Millenial Auction merupakan web bertemakan lelang, dimana user dapat berperan baik sebagai pembeli maupun penjual dalam melakukan transaksi jual beli. Seperti pada umumnya transaksi lelang, user dapat melakukan bidding terhadap objek di etalase dalam waktu yang ditentukan. Projek ini dibuat dengan bahasa PHP, framework Laravel dan Bootstrap, dan menggunakan API Ajax.

<h3>Kontributor:</h3>
<p>Rachelia Ayu Herdanii - 210711019</p>
<p>Idelia Jonathan - 210711105</p>
<p>Stepanus Petra Pambudi - 210711441</p>

<h3>Set-up Projek:</h3>

1. git clone
2. composer install
3. import database millenial_auction (DB_A_2.sql) di root
4. membuat file .env (menyesuaikan DB_DATABASE dengan millenial_auction)
5. php artisan key:generate
6. composer require laravel/passport
7. php artisan migrate
8. php artisan passport:install
9. membuat app password dari google account
10. membuat setting SMTP .env sesuai email dan app password
11. php artisan storage:link

<h3>Account</h3>
<b>Cara setup admin yaitu secara manual menambahkan foreign key id user di tabel admin.</b>
<br> <br>
    - Admin <br>
        Admin email : roma@gmail.com<br>
        Admin password : romaroma<br><br>
    - User<br>
        User email: marquez@gmail.com<br>
        User password: marquez<br>
    - User2<br>
        User email: nobitakun@gmail.com<br>
        User password: nobita<br>

## Hosting

-   LINK : [https://millennialauctions.my.id/](https://millennialauctions.my.id/)
