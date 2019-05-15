./permitions.sh
cd ../../orm
./propel-reverse-dev.sh
./propel.sh
cd ..
composer update
cd isys/scripts
./gruntback.sh
