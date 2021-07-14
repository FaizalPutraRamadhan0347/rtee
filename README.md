### Sedekah itu Mudah
sedekahitumudah.com
dev by webhade creative

#### Install

- Clone Project dari repo
- buat database dengan nama `sedekahitumudah`
- jalankan syntax berikut di cmd/terminal/git bash

```
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```

- Disable / comment code pada file `config\app.php` baris ke 179 menjadi seperti dibawah ini, agar tidak error ketika migrate pertama kali

```php
App\Providers\EventServiceProvider::class,
App\Providers\RouteServiceProvider::class,
// App\Providers\ConfigServiceProvider::class,
```

- jalankan migrate & seed berikut

```
$ php artisan migrate
$ php artisan db:seed
```

- Enable kembali code pada file `config\app.php` baris ke 179 tadi

```php
App\Providers\EventServiceProvider::class,
App\Providers\RouteServiceProvider::class,
App\Providers\ConfigServiceProvider::class,
```

- jalankan perintah berikut untuk menjalankan server

```
$ php artisan serve
```

jika user mysql bukan root dan ada passwordnya tidak kosong, silakan ubah settingan di file `.env` nya

#### Running

jalankan syntax berikut

```
$ php artisan serve
```

buka http://localhost:8000 di browser 

#### Akses Login Default

```
e: admin@gmail.com
p: admin

e: partner@gmail.com
p: partner

e: user@gmail.com
p: user
```
