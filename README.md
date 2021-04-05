### Sedekah itu Mudah
sedekahitumudah.com

#### Install

- Clone Project dari repo
- buat database dengan nama `sedekahitumudah`
- import database (`database/sedekahitumudah.sql`) 
- jalankan syntax berikut di cmd/terminal/git bash

```
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```

jika user mysql bukan root dan ada passwordnya tidak kosong, silakan ubah settingan di file `.env` nya

#### Running

jalankan syntax berikut

```
$ php artisan serve
```

buka http://localhost:8000 di browser 

#### Login Admin

```
e: admin@gmail.com
p: 1234567890
```

Untuk login user silahkan registrasi sendiri