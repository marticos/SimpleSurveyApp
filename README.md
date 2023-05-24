# Simple Survey Demo App

This is a demo app for testing purpose only.

### Setup instractions

Please install Laravel framwork its official docker container and import the repo with the following commnands.

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
- php artisan migrate
- php artisan optimize:clear
- npm install
- npm run dev

Please visit http://localhost/  with your Chrome browser and feel free to check the demo app.
