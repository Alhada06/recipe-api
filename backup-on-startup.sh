#!/bin/bash
# Backup script to dump MySQL database on startup

# Configuration
DB_HOST="localhost"
DB_PORT="3306"
DB_USER="${MYSQL_USER:-root}"
DB_PASSWORD="${MYSQL_PASSWORD}"
DB_NAME="${MYSQL_DATABASE:-mydatabase}"
BACKUP_DIR="/backup"
BACKUP_FILE="${BACKUP_DIR}/backup_$(date +%Y%m%d_%H%M%S).sql"

# Ensure the backup directory exists
mkdir -p $BACKUP_DIR

# Perform the backup
echo "Starting MySQL backup..."
mysqldump -h $DB_HOST -P $DB_PORT -u$DB_USER -p$DB_PASSWORD $DB_NAME > $BACKUP_FILE

if [ $? -eq 0 ]; then
    echo "Backup successful! Saved to $BACKUP_FILE"
else
    echo "Backup failed!" >&2
fi

# Proceed with the original entrypoint
exec "$@"
