# WUDS: Wi-Fi User Detection System (FORK)

WUDS is a proximity detection system that uses Wi-Fi probe requests, signal strength, and a white list of MAC addresses to create a detection barrier and identify the presence of foreign devices within a protected zone. Designed with the Raspberry Pi in mind, WUDS can be installed and configured on any system with Python 2.x and a wireless card capable of Monitor mode. See [http://www.lanmaster53.com/2014/10/wifi-user-detection-system/](http://www.lanmaster53.com/2014/10/wifi-user-detection-system/) for more information.

## WUDS FORK

* Added PHP frontend to display found MACs (refreshes every 5 minutes)
* Added some console output when running
* Added Alert for Telegram
* Added Alert for Pushbullet
* Disables WLAN0 on start

## Setup

```bash
# assumes wireless is WLAN0.  If not edit run.sh
# install prerequisites
# iw      - control the wi-fi interface
# pycapy  - access full 802.11 frames
# sqlite3 - interact with the database
# screen  - (optional) daemonize WUDS
sudo apt-get install iw python-pcapy sqlite3 screen
# PHP frontend prerequisites
sudo apt-get install apache2 php5-sqlite php5 libapache2-mod-php5 php5-mcrypt
# lauch a screen session
screen
# install WUDS
cd /var/www/html
#remove default index.html
rm index.html
#make sure you get the . in the next line so GIT clones to current dir
git clone https://github.com/ryancbutler/wuds.git .
cd wuds
# edit the config file
vim config.py
#if log.db is changed make sure to edit index.php to reflect new DB name
# execute the included run script
./run.sh
# Ctrl+A, D detaches from the screen session
```

## File Summary

* index.php - Web frontend
* alerts.py - custom alert modules
* config.py - configuration file
* core.py - core library
* run.sh - startup script
* README.md - this file