#!/bin/sh
#check if correct current path 
if [ -f server/config.ini ]; then echo "Update start"; else echo "wrong path, cd to portal folder";exit; fi

sudo crontab -u www-data crontab
cd c && mv index.html index1.html && mv index.htm index.html
