This is a small task to assess your skill in hosting web applications.

Server Environment
------------------
Please use CentOS for this test. Please commit all your configs inside the
`config/` folder in the Git repository. If you choose, you are free to use any
configuration management tool you choose.

PHP Application
---------------
We have provided a simple PHP application that talks to a small PostgreSQL
database. The PHP application is found in `src/`. The PHP application has
dependencies that must be installed with PHP's `composer` package manager.

Database
--------
The PostgreSQL database dump is in `data/`. The PHP application is configured
to connect to a database named `Blog` with the user `blog` and password `blog`
on the server `localhost`.

Web Server
----------
Use any web server you like to serve the PHP application.

Hosting
-------
We'd like to view the hosted application on EC2. If other hosting options are
cheaper and easier they are fine for this assessment.

