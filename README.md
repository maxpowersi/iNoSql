![alt tag](https://raw.githubusercontent.com/maxpowersi/iNoSql/master/res/img/icon.png)
# iNoSql v1.10
iNoSQL is a web application with no sql injection vulnerability. It was developed with the purpose of learn about no sql injections, how to exploit and avoid them. Also, the application can be used to test modern web application tools in order to know if the tool can be use to detect this type of vulnerability. It is distributed under the GNU GPLv3 license.
## Setup process
### 1. Install MongoDB
Windows:
```
Install from www.mongodb.com
```
Linux:
```
sudo apt-get install mongodb
```
### 2. Install Apache and PHP5
Windows:
```
Install XAMPP
```
Linux:
```
sudo apt-get install apache2
sudo apt-get install php5
```
### 3. Setup the driver
Windows:
```
Copy the file php_mongo.dll (inside the folder "setup") into the folder php/ext
Edit the php.ini file, and add the next: extension=php_mongo.dll
Restart Apache
```
Linux
```
sudo apt-get install php5-dev
sudo apt-get install pecl
sudo apt-get install libcurl4-openssl-dev pkg-config libssl-dev libsslcommon2-dev
sudo pecl install mongo
Edit the php.ini file, and add the next extension=mongo.so
sudo service apache2 restart
```
### 4. Enabled Rewrite module (only linux)
```
a2enmod rewrite
service apache2 restart
```
### 5. Setup the virtual host file
Remeber configure "AllowOverride All"
```
<VirtualHost *:80>
<Directory /var/www/html>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Require all granted
</Directory>
</VirtualHost>
```
### 6. Run MongoDB
Windows:
```
Create the folder "C:\data\db"
Run the script mongodb-start.bat inside "setup" folder
Also, if a mongo shell is required run the script ongodb-getshell.bat in the same folder
```
Linux:
```
service mongodb start
To get a shell run mongo
```
### 7. Clone the repository into the virtual host directory
For example:
```
/var/www/html
C:/xampp/httpdocs
```
### 8. Go to the application
Using the URL http://localhost/iNoSql/home and go to the "Setup" page, then click the button "Install".
## Virtual machine
If you do not want to intall the application, you can download the virtual machine (ubuntu server) from google drive.
Note: Please, the virtual machine is not updated with the leatest version of iNoSql, please update it, using git clone from the repository.
```
User: inosql
Password: inosql
```
##### [Download](http://inosqlvm.maxpowersi.com.ar)
## iNoSql OWASP Argentina 2017
You can download the spanish presentation from OWASP Argentina 2017, where iNoSql was showed.
##### [Download](https://drive.google.com/file/d/0B4pgtVI19PJibzF0VmRzNFkxdGc)
