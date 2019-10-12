To build database from scratch (in terminal):

>mysql.server start
>mysql -uroot -proot

In MySQL:

>CREATE DATABASE library;
>USE library;
>CREATE TABLE books (title VARCHAR(255), id serial PRIMARY KEY);
>CREATE TABLE authors (name VARCHAR(255), id serial PRIMARY KEY);
>CREATE TABLE authors_books (author_id int, book_id int, id serial PRIMARY KEY);
