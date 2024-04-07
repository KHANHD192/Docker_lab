#!/bin/bash

chown root:docker /var/run/docker.sock
apache2ctl start && bash
exec "$@"