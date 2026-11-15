#!/bin/bash
# Usage: ./scripts/migrate-url.sh <NEW_URL_OR_IP> (e.g., ./scripts/migrate-url.sh http://192.168.1.100:8080)
NEW_URL=$1
OLD_URL="http://localhost:8080"
if [ -z "$NEW_URL" ]; then
  echo "Error: Please provide the target URL or IP."
  echo "Example: ./scripts/migrate-url.sh http://YOUR_SERVER_IP:8080"
  exit 1
fi
echo "Migrating WordPress site URL from $OLD_URL to $NEW_URL..."
docker exec kfc-mysql mysql -u jerry -pJshunqi724 wordpress_db -e "
UPDATE wp_options SET option_value = '$NEW_URL' WHERE option_name IN ('siteurl', 'home');
UPDATE wp_posts SET post_content = REPLACE(post_content, '$OLD_URL', '$NEW_URL');
UPDATE wp_posts SET guid = REPLACE(guid, '$OLD_URL', '$NEW_URL');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, '$OLD_URL', '$NEW_URL');
"
echo "URL migration completed successfully! Site is now accessible at $NEW_URL"
