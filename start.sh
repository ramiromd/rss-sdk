#!/bin/bash

DOCKER_IMG="rss-sdk:latest"
CONTAINER_NAME="rss-sdk"

if [ ! -z "$1" ]; then
    DOCKER_IMG="$1"
fi

if [ ! -z "$2" ]; then
    CONTAINER_NAME="$2"
fi

echo "Iniciando contenedor $CONTAINER_NAME, utilizando imagen: $DOCKER_IMG"

docker run -d --tty --name $CONTAINER_NAME \
--mount type=bind,source=$PWD,target=/usr/src/sdk \
$DOCKER_IMG

docker ps -a | grep $CONTAINER_NAME
