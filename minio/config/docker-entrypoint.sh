#!/bin/sh
set -e

mc mb -l data/falves

exec /usr/bin/docker-entrypoint.sh "$@"