# code-20210809-alexey-plodenko
Laravel 8, PHP 7.4, MySQL 5.7, Docker, REST API

## Prerequisites
Docker, Composer installed locally.

Free port - 80.

## To start the project
1. Navigate to the project's directory in CLI.
2. Navigate to `/src/backend` and execute `composer install`.
4. Navigate to the project's root directory and execute `docker-compose up`.
5. Navigate to `/backend` and execute `php artisan migrate:fresh`.

# TODO
* Properly model the employees in the DB and add a model into L for it.

# Done
We expect to see:
● A backend application in PHP that consumes the list of employees via API. - DONE

● A SPA frontend that calls the backend API, shows the employees list - DONE

● The design of the frontend is not important and is not judged in this test - DONE

● A full git log showing work done - DONE

● A README to explain how to boot and run the end result - DONE

What would be nice to have:

● PHP 7.4 usage - DONE

● DEV, TEST, PROD environments - DONE

● Unit tests (PHPUnit) - DONE. There is nothing to test with unit tests. So implemented the feature tests.

● Mocks for API client - NOT DONE. As no unit tests.

● Full docblock comments - DONE

● Clean and quality code - :) DONE

● Good code structure - DONE
