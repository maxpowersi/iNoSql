![alt tag](https://raw.githubusercontent.com/maxpowersi/iNoSql/master/res/img/icon.png)<br/>
<br>
# iNoSql v1.9
<br/>
iNoSQL is a web application with no sql injection vulnerability. It was developed with the purpose of learn about no sql injections, how to exploit and avoid them. Also, the application can be used to test modern web application tools in order to know if the tool can be use to detect this type of vulnerability. It is distributed under the GNU GPLv3 license.<br/>
Setup process: <br/>
<br/>
1. Install MongoDB<br/>
	Linux:<br/>
		sudo apt-get install mongodb<br/>
2. Install apache and PHP5<br/>
    Windows:<br/>
        install XAMPP<br/>
    Linux:<br >
        sudo apt-get install apache2<br/>
        sudo apt-get install php7.0<br/>
3. Setup the driver<br/>
    Windows:<br/>
        Copy the file php_mongo.dll inside the folder "setup", into the folder php/ext<br/>
        Edit the php.ini file, and add the next extension=php_mongo.dll<br/>
        Restart Apache<br/>
    Linux<br/>
        sudo apt-get install php5-dev<br >
        sudo apt-get install pecl<br/>
        sudo apt-get install libcurl4-openssl-dev pkg-config libssl-dev libsslcommon2-dev<br />
        sudo pecl install mongo<br/>
        Edit the php.ini file, and add the next extension=mongo.so<br/>
        sudo service apache2 restart<br/>
4. Run MongoDB<br/>
    Windows:<br/>
		Create the folder "C:\data\db"
        Run the script mongodb-start.bat inside "setup" folder<br/>
        Also, if a mongo shell is required run the script ongodb-getshell.bat in the same folder<br/>
    Linux:<br/>
        service mongodb start<br/>
        To get a shell run mongodb.
5. Copiar la carpeta web en el directorio de apache, y configurar el virtual host, con pagina inicial "/home".<br/>
6. Go to the application, and go to the "Setup" page, then click the button "Install".<br/>
