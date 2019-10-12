##
# Salon App

##### _._

#### Mike Chastain

## Description

_An app for a Salon in which you can enter a list of stylists, you can click on the list of stylists to show a list of their clients.  You can add clients in this page as well._

## Setup

Reference app_outline.jpg for proposed structure.

```
$ composer install
```

```
create database hair_salon;
USE hair_salon;
CREATE TABLE stylists (name VARCHAR (255), id serial PRIMARY KEY);
CREATE TABLE clients (name VARCHAR (255), stylist_id INT, id serial PRIMARY KEY);

```

_then start up a local PHP server from within the "web" directory within the project's folder and point your browser to whatever local host server you have created._  

## Technologies Used

_This project makes use of PHP, the testing framework [PHPUnit](https://phpunit.de/), the micro-framework [Silex](http://silex.sensiolabs.org/), and uses [Twig](http://twig.sensiolabs.org/) templates, and mysql_

## To Do
* _add functionality for find in client and stylist correctly_
* _improve formatting of pages_
* _add bling_


### Legal



Copyright (c) 2015 Mike Chastain

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
