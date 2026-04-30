#!/bin/bash
DATE=$(date +%F_%H-%M)
BACKUP_DIR="/home/ubuntu/backups"
mkdir -p $BACKUP_DIR
mysqldump -u wp_user -p'CloudAdmin123!' wordpress_db > $BACKUP_DIR/db_$DATE.sql
sudo tar -czf $BACKUP_DIR/files_$DATE.tar.gz -C /var/www/ html/
