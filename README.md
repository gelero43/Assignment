# Assignment
PHP sender and receiver using rabbitmq as message broker

## Requirements
  *PHP Version 7.2.5+
  *Composer Installed
  *Apache server

## Running the project
If you are using xammp download the files and copy them inside htdocs.After that open a terminal in that directory and run `composer install` command.
Edit `connectionToDB.php` and set your username and password.If you are using different servername or/and db change them as well.
If myData table dont exist in your database run the command `php createTable.php` command in the directory that the file is located to create the table.

Table structure:
  *id(PRIMARY KEY) int(6) UNSIGNED,AUTO_INCREMENT
  *gatewayEui int(11) NOT NULL
  *profileId int(11) NOT NULL
  *endpointId int(11) NOT NULL
  *clusterId int(11) NOT NULL
  *attributeId int(11) NOT NULL
  *aValue int(11) NOT NULL
  *aTimestamp timestamp NOT NULL
  
Edit the `sender.php` and set your username and password for rabbitmq.If you are using different url or/and different exchange then change them too.
Edit the `receiver.php` and set your username and password for rabbitmq.If you are using different url or/and different exchange then change them too.
In one terminal run the command `php sender.php`.
In another terminal run the command `php receiver.php`.
