#!/usr/bin/env bash

cd /vagrant/source
composer install --no-interaction

vendor/bin/doctrine-migrations migrations:migrate --no-interaction