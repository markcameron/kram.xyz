# Stark #

## Laravel 5 with AdminLTE Theme ##

This repo is to be forked into a new project when starting a new Laravel 5 project. Only makes changes to this repository if updating base code for future forks

## Information ##

* Laravel Version: **5.1**

## Requirements ##

Composer is required to install laravel and its dependancies

* https://getcomposer.org/

## Installation ##

* **FORK THIS REPO IF YOU HAVEN'T ALREADY**
* Clone your newly forked repo to your working directory.
* Create a Database called `stark` (or whatever you want)
* Copy the `.env.example` file to `.env` in the `laravel/` folder and change the values as necessary:
* Run the command `composer install`
* Run the command `./build/deploy.sh`
* You can now navigate to your site and log in with:
> **E-mail:** admin@example.com
> **Password:** admin

* ** Running tests **
* Run the command `./build/test.sh` or `phpunit --coverage-html build/coverage --log-junit build/junit.xml`

## Who do I talk to? ##

* Mark Cameron <mark.cameron@devfactory.ch>
  BitBucket: @markcameron