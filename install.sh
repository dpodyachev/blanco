#!/bin/sh
sudo crontab -u www-data crontab
cd c && mv index.html index1.html && mv index.htm index.html