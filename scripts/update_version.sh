#!/bin/bash
# This script catches the version passed from Jenkins/GitHub
echo $DEPLOYMENT_VERSION > /var/www/html/version.txt