# Simple Survey Demo App

This is a demo app for testing purpose only.

### Setup instructions

Please install Laravel framework its official docker container and import the repo with the following commnands.

For Mac users (Docker Desktop recommended):

- curl -s "https://laravel.build/SympleSurveyApp" | bash

For Linux users:

- curl -s https://laravel.build/SimpleSurveyApp | bash

- cd SimpleSurveyApp

Import the repo with my code first

- git init
- git remote add origin git@github.com:marticos/SimpleSurveyApp.git
- git checkout -f master

Setup and run the containers

- ./vendor/bin/sail up -d

Access the main container
If you're using docker desktop just click on the name of the container, it should be laravel.test-1 (please check), and then click on the terminal tab.

If you're on linux or wish to use your terminal:

- docker ps
- Copy the container id for simplesurveyapp-laravel.test-1 (please check the correct container name)
- docker exec -it [docker id] /bin/sh

Initialise the project within the container

- php artisan migrate
- php artisan optimize:clear
- npm install
- npm run dev

Please visit http://localhost/  with your Chrome browser and feel free to check the demo app.
