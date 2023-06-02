#!/bin/bash
#
# Get a login link for the environment.
#
set -e

docker-compose exec -T drupal /bin/bash -c "chown -R www-data:www-data sites/default/files && drush cr"
docker-compose exec -T drupal /bin/bash -c "drush -l $(docker-compose port webserver 80) uli"
