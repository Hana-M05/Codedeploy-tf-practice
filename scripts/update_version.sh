#!/bin/bash
# This script runs during the CodeDeploy AfterInstall hook

# 1. Set permissions so Apache can read the files CodeDeploy just dropped
chown -R ec2-user:apache /var/www/html
chmod -R 755 /var/www/html

# 2. Write the version to the file so index.php can read it
# We will pass TARGET_VERSION from Jenkins in the next step
echo "${TARGET_VERSION}" > /var/www/html/version.txt