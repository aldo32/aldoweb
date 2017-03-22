#!/bin/sh

cd /srv/admin.kash.com/web/
composer install --no-dev

cd /srv/admin.kash.com/web/application/config

DIR="/isDev"
if [ -d "$DIR" ]; then

  # es ambiente de desarrollo
  #get db creds
  aws s3 cp s3://kichink-config-dev/db/dev-data-kash-3.0.txt . --region us-east-1
  mv dev-data-3.0.txt database.php

  #get redis creds
  aws s3 cp s3://kichink-config-dev/cache/redis-dev-data.txt . --region us-east-1
  mv redis-dev-data.txt redis.php
else

  # es ambiente de produccion
  #get db creds
  aws s3 cp s3://kichink-config/db/prod-data.txt . --region us-east-1
  mv prod-data.txt database.php

  #get redis
  aws s3 cp s3://kichink-config/cache/redis-prod-data.txt . --region us-east-1
  mv redis-prod-data.txt redis.php
fi


apache2ctl graceful
ID="`wget -q -O - http://169.254.169.254/latest/meta-data/local-ipv4 || die \"wget instance-id has failed: $?\"`"
DATE="`date +%Y-%m-%d_%H:%M:%S`"
echo $ID $DATE >> /srv/admin.kash.com/web/content/last_updated.txt
