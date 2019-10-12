
# Library App

##### _An app for a librarian to organize books, patrons, and the checkout process._

#### AUTHORS:
_Mike Chastain & Casey Heitz_

## To Do

(Note: Tables are marked with _t for easy recoginition (eg authors_t))

Add class and tests for Checkout (table checkouts_t) with properties copy_id, patron_id, due_date, checked_out, and id

Add functions for interaction between Checkout and Patron, and Checkout and Copy

Build Silex routes and Twig files

#### Research Notes

Sort by using last name instead of whole name string?

* Test out: ```RIGHT(p.name, LOCATE(' ', REVERSE(p.name)) - 1)```

## Setup

```
$ composer install
$ apachectl start
```
To build database from scratch (in terminal):
```
>mysql.server start
>mysql -uroot -proot
```

If importing database from github, use library.sql.zip.  Else follow directions below to rebuild the database.

In MySQL:

```
CREATE DATABASE library;

USE library;
```
---
In phpmyadmin:
* Click on library database
* Click SQL tab
* Copy and paste the code below (from RAW) into the window below the line "Run SQL query/queries on database library"
* Click Go

If test database is wanted to run tests, make a copy of the library database with the name 'library_test'

```
-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'authors_books_t'
--
-- ---

DROP TABLE IF EXISTS `authors_books_t`;

CREATE TABLE `authors_books_t` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `author_id` INTEGER NULL DEFAULT NULL,
  `book_id` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'authors_t'
--
-- ---

DROP TABLE IF EXISTS `authors_t`;

CREATE TABLE `authors_t` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'books_t'
--
-- ---

DROP TABLE IF EXISTS `books_t`;

CREATE TABLE `books_t` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `title` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'copies_t'
--
-- ---

DROP TABLE IF EXISTS `copies_t`;

CREATE TABLE `copies_t` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `book_id` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'patrons_t'
--
-- ---

DROP TABLE IF EXISTS `patrons_t`;

CREATE TABLE `patrons_t` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'checkouts_t'
--
-- ---

DROP TABLE IF EXISTS `checkouts_t`;

CREATE TABLE `checkouts_t` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `copy_id` INTEGER NULL DEFAULT NULL,
  `patron_id` INTEGER NULL DEFAULT NULL,
  `due_date` DATE NULL DEFAULT NULL,
  `checked_out` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys
-- ---

ALTER TABLE `authors_books_t` ADD FOREIGN KEY (author_id) REFERENCES `authors_t` (`id`);
ALTER TABLE `authors_books_t` ADD FOREIGN KEY (book_id) REFERENCES `books_t` (`id`);
ALTER TABLE `copies_t` ADD FOREIGN KEY (book_id) REFERENCES `books_t` (`id`);
ALTER TABLE `checkouts_t` ADD FOREIGN KEY (copy_id) REFERENCES `copies_t` (`id`);
ALTER TABLE `checkouts_t` ADD FOREIGN KEY (patron_id) REFERENCES `patrons_t` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `authors_books_t` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `authors_t` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `books_t` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `copies_t` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `patrons_t` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `checkouts_t` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `authors_books_t` (`id`,`author_id`,`book_id`) VALUES
-- ('','','');
-- INSERT INTO `authors_t` (`id`,`name`) VALUES
-- ('','');
-- INSERT INTO `books_t` (`id`,`title`) VALUES
-- ('','');
-- INSERT INTO `copies_t` (`id`,`book_id`) VALUES
-- ('','');
-- INSERT INTO `patrons_t` (`id`,`name`) VALUES
-- ('','');
-- INSERT INTO `checkouts_t` (`id`,`copy_id`,`patron_id`,`due_date`,`checked_out`) VALUES
-- ('','','','','');

```
## Technologies Used

_This project makes use of PHP, the testing framework [PHPUnit](https://phpunit.de/), the micro-framework [Silex](http://silex.sensiolabs.org/), uses [Twig](http://twig.sensiolabs.org/) templates, and [MySQL](https://www.mysql.com/) as the database._


### Legal



Copyright (c) 2015 Mike Chastain and Casey Heitz

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
