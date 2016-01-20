Guestbook demo:
-   it is made with hardcoded dependency with mysql 
    database login information is in guestbookPHP/lib/_core/Model.php
-   it is also hardcoded the directory route, it should be published in:     /guestbookPHP/ in the root directory

-   server must be configured to allow .htaccess configuration
-   server must have enabled mod_rewrite
-   server must have installed PHP 5.6, php5-mysql, mysql 5.5
-   there is a file called database with the queries to:
    create the database, create the table, allow access to the user, create user