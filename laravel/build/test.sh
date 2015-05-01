#!/bin/bash
set -e

# WORKING DIRECTORIES
os=$(uname -a | awk '{print $1}')
if [ $os == "Darwin" ] || [ $os == "MINGW32_NT-6.2" ];
then
    currpwd=$(pwd);
    cwd=$(cd "$(dirname "$0")"; pwd);
    cd $currpwd;
else
    cwd=$(dirname $(readlink -e $0));
fi

# Go to the main directory
cd $cwd/..

# Run the tests
export APP_ENV=testing
export DB_NAME=testing_stark

php artisan migrate:reset

if [ "$cover" == "cover" ]
then
  php phpunit.phar --coverage-html build/coverage --log-junit build/junit.xml
else
  php phpunit.phar --log-junit build/junit.xml
fi
