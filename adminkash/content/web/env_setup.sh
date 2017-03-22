sudo apt-get -y update
#sudo add-apt-repository ppa:ondrej/php5-5.6
#sudo apt-get update
#sudo apt-get install python-software-properties
#sudo apt-get update

sudo apt-get --force-yes --yes install apache2 apache2-mpm-prefork apache2-utils libexpat1 ssl-cert redis-server php5-redis libapache2-mod-php5 php5 php5-common php-apc php5-curl php5-dev php5-gd php5-imagick php5-mcrypt php5-memcache php5-memcached php5-mhash php5-mysql php5-pspell php5-snmp php5-sqlite php5-xmlrpc php5-xsl build-essential tcl8.5

echo "ServerName kashAPI" >> /etc/apache2/apache2.conf

cd /etc/apache2/sites-available

#Remoive default sites
sudo  a2dissite 000-default.conf

rm 000-default.conf
rm default-ssl.conf

#Create new site availible
#Add virtual host config for our sites
cat <<EOF >api.kash.kichink.com.conf
#Admin
<VirtualHost *:80>
    ServerName api.kash.kichink.com

    DocumentRoot /srv/api.kash.kichink.com/content/
    <Directory /srv/api.kash.kichink.com/content/ >
         Require all granted
         Options FollowSymLinks MultiViews
         AllowOverride All
    </Directory>
    ErrorLog /api_error.log
    LogLevel warn
    CustomLog /api_access.log combined
</VirtualHost>
EOF

a2ensite api.kash.kichink.com.conf

a2enmod rewrite

php5enmod mcrypt

apache2ctl graceful
