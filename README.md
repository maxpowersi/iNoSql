iNoSql v1.0 

This is a vulnerable nosql injection site . It was created to learn and train about NoSQL injections.<br />

Trello: https://trello.com/b/QPoYwC6w/inosql

Setup process: <br />

1. Install mongodb<br />
    sudo apt-get install mongodb<br />
2. Install apache and php<br />
    For windows<br />
        install XAMPP<br />
    For linux<br />
        sudo apt-get install apache2<br />
        sudo apt-get install php7.0<br />
3. Mongo Php Driver Connector<br />
    For windows<br />
        copy the file php_mongo.dll into php/ext<br />
        edit the php.ini with extension=php_mongo.dll <br />
        restart apache<br />
    For linux<br />
        sudo apt-get install php5-dev<br />
        sudo apt-get install pecl<br />
        sudo apt-get install libcurl4-openssl-dev pkg-config libssl-dev libsslcommon2-dev<br />
        sudo pecl install mongo<br />
        edit the php.ini with extension=mongo.so<br />
        sudo service apache2 restart<br />
4. Start mongodb <br />
    For windows<br />
		Create the folder "C:\data\db"
        Run mongodb-start.bat <br />
    For linux<br />
        execute: service mongodb start<br />
5. Run database.nosql in mongodb to create (running mongo command).<br />
	For windows, use the script mong-getshell.bat, to get a mongo shell.<br />
6. Copy the site into apache folder.<br />