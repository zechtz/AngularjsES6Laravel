# MNRT Portal - Getting up to speed

## The tech stack
### Backend
-PHP /  Laravel Framework(~7.xx)

### FrontEnd
-AngularJS (ES6)
-SASS

## Install Dependencies

Install PHP/Laravel Package Dependencies

````sh
composer install
```

install Nodejs & npm
[click here for instructions to install npm](http://nodejs.org)

Once you have npm installed then you need toinstall webpack by running the command
Webpack is needed because all Javascript Code is written using ES6 standard

```sh
sudo npm install webpack -g
```

Once you have bower install run the following command in your project's root directory

```sh
npm install
```

This will install all javascript modules & libraries used in the project

*Rename the env.example file to .env and then update the new file with your corrent settings
Once you have everything installed, just run

```sh
webpack
```

This will compile all the javascript code and watch for for new changes
