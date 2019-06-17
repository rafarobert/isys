set XDEBUG_CONFIG=idekey=123
set ESTIC_ORIGIN=isys/scripts
set SERVER_NAME=local.estic.com.bo
set SERVER_PORT=80
set SHELL=CMD
set XDEBUG_CONFIG=remote_enable=1 remote_mode=req remote_port=9000 remote_host=127.0.0.1 remote_connect_back=0
php -B "$_REQUEST = array('email' => 'rafael@estic.com.bo', 'password' => '123', 'login' => 'ingresar');" -F ../../index.php sys/migrate/fromdatabase
echo -e "\012"
propel-config.bat
propel-reverse-prod.bat
propel-build-sql-prod.bat
cd ../..
composer dump-autoload -o
cd isys/scripts
