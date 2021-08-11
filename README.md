# code-20210809-alexey-plodenko
Laravel 8, PHP 7.4, MySQL 5.7, Docker, REST API

## Prerequisites
Docker, Composer installed locally.

Free port - 80.

## To start the project
1. Navigate to the project's directory in CLI.
2. Navigate to the project's root directory and execute `docker-compose up`.
3. Navigate to `/src/backend`
4. Execute `composer install`.
5. Open `http://localhost/` in the browser for the UI.
6. Run `php artisan test` to run the tests.

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

# Technical questions
### How long did you spend on the coding test?
5.5 hours.

### What would you add to your solution if you had more time? If you didn't spend much time on the coding test then use this as an opportunity to explain what you would add.
Data guards for the user requests.

Models and proper DB structure for the employees. 

### How would you track down a performance issue in production?
Replicate locally and debug.

If not replicable, add metrics to the code and deploy.

### Have you ever had to do this?
Yes.
