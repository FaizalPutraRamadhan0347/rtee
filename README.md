### Sedekah itu Mudah
sedekahitumudah.com

#### Install

- Clone Project dari repo
- buat database dengan nama `sedekahitumudah`
- jalankan syntax berikut di cmd/terminal/git bash

```
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
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
