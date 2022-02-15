#!/bin/sh

# create log folders
mkdir -p data/logs

# create log files
[ -e "data/logs/access.log" ] || touch "data/logs/access.log"
[ -e "data/logs/error.log" ] || touch "data/logs/error.log"

# run the docker compose scripts
cd docker && docker-compose build --force-rm
