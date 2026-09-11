#!/bin/bash
# Get the version from AWS Parameter Store
VERSION=$(aws ssm get-parameter --name "/app/version" --query "Parameter.Value" --output text --region us-west-2)

# Write it to the file PHP reads
echo "$VERSION" > /var/www/html/version.txt

# Fix permissions
chown -R ec2-user:apache /var/www/html
chmod -R 755 /var/www/html