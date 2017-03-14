# iNoSql v1.7

iNoSQL es una aplicación web vulnerable a inyecciones No SQL. Fue creada con la intención de enseñar como detectar, explotar y remediar este tipo de inyección. Tambien puede ser usada para probar una herramienta es capaz de detectar este tipo de vulnerabilidad<br/> 

Instalación: <br/>

1. Instalar MongoDB<br/>
	Linux:<br/>
		sudo apt-get install mongodb<br/>
2. Instalar apache y PHP5<br/>
    Windows:<br/>
        instalar XAMPP<br/>
    Linux:<br >
        sudo apt-get install apache2<br/>
        sudo apt-get install php7.0<br/>
3. Configurar el driver de conexión<br/>
    Windows:<br/>
        Copiar el archivo php_mongo.dll que se encuentra en la carpeta "setup", en el directorio php/ext<br/>
        Editar el archivo php.ini con extension=php_mongo.dll<br/>
        restart apache<br/>
    Linux<br/>
        sudo apt-get install php5-dev<br >
        sudo apt-get install pecl<br/>
        sudo apt-get install libcurl4-openssl-dev pkg-config libssl-dev libsslcommon2-dev<br />
        sudo pecl install mongo<br/>
        Editar el archivo php.ini con extension=mongo.so<br/>
        sudo service apache2 restart<br/>
4. Iniciar MongoDB<br/>
    Windows:<br/>
		Crear la carpeta "C:\data\db"
        Ejecutar el script mongodb-start.bat que esta dentro de la carpeta "setup"<br/>
        Adicionalmente, si se requiere una shell, se puede ejecutar el archivo mongodb-getshell.bat<br/>
    Linux:<br/>
        service mongodb start<br/>
        Para obtener una shell, ejectuar mongodb desde una termina.
5. Copiar la carpeta web en el directorio de apache, y configurar el virtual host, con pagina inicial "/home".<br/>
6. Iniciar la aplicación, entrar a la opción del menu "Instalar", y ejecutar el boton "instalar".<br/>
7. La aplicación esta lista para usarse.