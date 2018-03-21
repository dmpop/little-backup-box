#!/usr/bin/env bash

# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.

# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.

# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

sudo apt update
sudo apt dist-upgrade -y
sudo apt install acl git-core screen rsync exfat-fuse exfat-utils ntfs-3g gphoto2 libimage-exiftool-perl dialog php5-cli -y

sudo mkdir /media/card
sudo mkdir /media/storage
sudo chown -R pi:pi /media/storage
sudo chmod -R 775 /media/storage
sudo setfacl -Rdm g:pi:rw /media/storage

cd
git clone https://github.com/dmpop/little-backup-box.git

HEIGHT=15
WIDTH=40
CHOICE_HEIGHT=4
BACKTITLE="Little Backup Box"
TITLE="Backup mode"
MENU="Select the desired backup mode:"

OPTIONS=(1 "Card backup"
         2 "Camera backup"
         3 "Remote backup")

CHOICE=$(dialog --clear \
                --backtitle "$BACKTITLE" \
                --title "$TITLE" \
                --menu "$MENU" \
                $HEIGHT $WIDTH $CHOICE_HEIGHT \
                "${OPTIONS[@]}" \
                2>&1 >/dev/tty)

clear
case $CHOICE in
        1)
            crontab -l | { cat; echo "@reboot sudo /home/pi/little-backup-box/card-backup.sh"; } | crontab
	    crontab -l | { cat; echo "#@reboot sudo /home/pi/little-backup-box/camera-backup.sh"; } | crontab
	    crontab -l | { cat; echo "#@reboot cd /home/pi/little-backup-box ; sudo php -S 0.0.0.0:8080"; } | crontab
            ;;
        2)
            crontab -l | { cat; echo "#@reboot sudo /home/pi/little-backup-box/card-backup.sh"; } | crontab
	    crontab -l | { cat; echo "@reboot sudo /home/pi/little-backup-box/camera-backup.sh"; } | crontab
	    crontab -l | { cat; echo "#@reboot cd /home/pi/little-backup-box ; sudo php -S 0.0.0.0:8080"; } | crontab
            ;;
        3)
            crontab -l | { cat; echo "#@reboot sudo /home/pi/little-backup-box/card-backup.sh"; } | crontab
	    crontab -l | { cat; echo "#@reboot sudo /home/pi/little-backup-box/camera-backup.sh"; } | crontab
	    crontab -l | { cat; echo "@reboot cd /home/pi/little-backup-box ; sudo php -S 0.0.0.0:8080"; } | crontab
            ;;
esac

echo "------------------------"
echo "All done! Please reboot."
echo "------------------------"
