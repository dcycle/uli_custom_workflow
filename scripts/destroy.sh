#!/bin/bash
#
# Destroy the environment.
#
set -e

docker-compose down -v
docker network rm uli_custom_workflow_default
