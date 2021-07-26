<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Backend fejlesztő próbafeladat
A feladat egy kampánymenedzser leprogramozása, amely az alábbi feltételek alapján
képes kampányokat ki és bekapcsolni:

- A kampányoknak van kezdeti és végdátuma.
- A kampányokhoz tartozhatnak Termékek, Blog posztok és Kuponok.

A fenti entitásokra a következő szabályok vonatkoznak:
- Egy blog poszt nem publikálódhat hétvégén
- Egy termék publikálódhat bármelyik nap
- Egy kupon csak a hónap első 3 és utolsó 3 napján aktiválódhat
- Nem futhat két kampány egyidőben, ugyanazokra az elemekre
- A kampányok futtatásának feltétele, hogy jóváhagyott státuszban legyenek

### Fejlesztéshez használt eszközök:
- MS Windows 10
- PHP 7.4.15
- MariaDB 10.4.17
- Xampp: v3.2.4
- PhpStorm 2021.1.4
- Laravel 8.4

###Telepítés és használat:
1. Klónozd a projectet github-ról!
    - futtasd: git clone https://github.com/AndreasGeorgopulos/biotechusa.git biotechusa
2. Futtasd a Composer-t a telepítéshez!
    - composer install
3. Hozz létre egy adatbázist!
4. Hozd létre a .env file-t és másold át a .env.example tartalmát!
5. Add meg az adatbázis eléréshez szükséges adatokat a .env file-ban!
    - DB_DATABASE
    - DB_USERNAME
    - DB_PASSWORD
6. Generáld le az alkalmazáshoz szükséges kulcsot!
    - futtasd: php artisan key:generate
7. Futtasd az adatbázis migrációt és seeder-t! Néhány mintadat és egy admin user jön létre.
    - futtasd: php artisan migrate --seed
8. Ha minden OK, indítható a project:
    - futtasd: php artisan serve
    - http://127.0.0.1:8000/admin
    - email: info@biotechusa.com
    - password: aA123456
