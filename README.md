![alt tag](https://raw.githubusercontent.com/maxpowersi/iNoSql/master/res/img/icon.png)<br/>
<br>
# iNoSql v1.10
<br/>
iNoSQL is a web application with no sql injection vulnerability. It was developed with the purpose of learn about no sql injections, how to exploit and avoid them. Also, the application can be used to test modern web application tools in order to know if the tool can be use to detect this type of vulnerability. It is distributed under the GNU GPLv3 license.<br/>
Setup process: <br/>
<br/>
1. Install MongoDB<br/>
	Linux:<br/>
		sudo apt-get install mongodb<br/>
2. Install Apache and PHP5<br/>
	Windows:<br/>
        	Install XAMPP<br/>
    	Linux:<br/>
        	sudo apt-get install apache2<br/>
        	sudo apt-get install php5<br/>
3. Setup the driver<br/>
    	Windows:<br/>
        	Copy the file php_mongo.dll (inside the folder "setup") into the folder php/ext<br/>
        	Edit the php.ini file, and add the next: extension=php_mongo.dll<br/>
        	Restart Apache<br/>
    	Linux<br/>
        	sudo apt-get install php5-dev<br >
        	sudo apt-get install pecl<br/>
        	sudo apt-get install libcurl4-openssl-dev pkg-config libssl-dev libsslcommon2-dev<br/>
        	sudo pecl install mongo<br/>
        	Edit the php.ini file, and add the next extension=mongo.so<br/>
        	sudo service apache2 restart<br/>
4. Enabled Rewrite module (only linux)<br/>
	Linux:<br/>
		a2enmod rewrite<br/>
		service apache2 restart<br/>
5. Setup the virtual host file (remeber configure "AllowOverride All"), for example:<br/>
	<VirtualHost *:80><br/>
	    <Directory /var/www/html><br/>
		Options Indexes FollowSymLinks MultiViews<br/>
		AllowOverride All<br/>
		Require all granted<br/>
	    </Directory><br/>
	</VirtualHost><br/>
6. Run MongoDB<br/>
	Windows:<br/>
		Create the folder "C:\data\db"<br/>
        	Run the script mongodb-start.bat inside "setup" folder<br/>
        	Also, if a mongo shell is required run the script ongodb-getshell.bat in the same folder<br/>
    	Linux:<br/>
        	service mongodb start<br/>
        	To get a shell run mongo<br/>
7. Clone the repository into the virtual host directory, for example "/var/www/html" or "C:/xampp/httpdocs".<br/>
8. Go to the application (using the URL http://localhost/iNoSql/home) and go to the "Setup" page, then click the button "Install".<br/>
<br/>
<br/>
If you do not want to intall the application, you can download the virtual machine (ubuntu server) from google drive.<br/>
<br/>
	User: inosql<br/>
	Password: inosql<br/>
	Download: https://googledrive.com
