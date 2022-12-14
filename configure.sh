#!/bin/sh

# blek! Announcement code snippet
jq <<< ""
if [ $? == 0 ]; then
    DATA=$(curl -s https://blek.codes/announce.json)
    if [[ $(jq -r '.broadcast' <<< $DATA) == 'true' ]]; then
        echo -e "Message from \033[36m\033[1mblek.codes\033[0m: $(jq -r '.data.inline' <<< $DATA)";
        sleep 2
    fi
else
    echo "jq is not installed"
fi

# check if docker is available
docker info > /dev/null
if [ $? -ne 0 ]; then
    echo
    echo "Docker is not running. Does the script has access to docker socket?"
    echo "Its also a possibility that docker is not installed at all. Check the output above for better info."
    exit 8
fi

# check if php is available
php -v > /dev/null
if [ $? -ne 0 ]; then
    echo "PHP not found"
    exit 4
fi

# remove vendor
if [ -d 'vendor' ]; then
    echo "Vendor directory found, removing..."
    rm -rf vendor
fi

# remove composer.lock
if [ -f 'composer.lock' ]; then
    echo "Composer.lock found, removing..."
    rm -f composer.lock
fi

# check if artisan is available
if [ ! -f 'artisan' ]; then
    echo 'Artisan file is missing'
    exit
fi

# if not available already
mkdir db > /dev/null 2>&1

composer install

if [ -f '.env' ]; then
    echo "dotenv found, keeping it"
else
    echo "Copying example dotenv"
    cp .env.example .env
    php artisan key:generate > /dev/null
    echo "If you want to edit dotenv, do it now and press any key when you are done."
    read -n 1 -p ""
fi

echo "Clearing cache..."

php artisan view:clear > /dev/null
php artisan cache:clear > /dev/null
php artisan config:clear > /dev/null

echo "Building docker images (this might take a while)..."
docker-compose build
docker-compose up -d
docker exec -it blek-server-1 php artisan migrate
docker exec -it blek-server-1 chmod 775 -R /var/www/html/storage
docker exec -it blek-server-1 chown nobody:nobody -R /var/www/html/storage
docker-compose down

echo
echo -e "All set up! The website is ready to run, just run \033[1;36m\033[1msail.sh\033[0m and you're ready to go production\!"
exit 0