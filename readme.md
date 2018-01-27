# MNRT Portal - Getting up to speed

## The tech stack
### Backend
-PHP /  Laravel Framework(5.5LTS)

### FrontEnd
-AngularJS
-SASS

All clientside dependencies are managed through bower, so first make sure you have npm and bower installed globally

[click here for instructions to install npm](http://nodejs.org)

Once you have npm installed then you can just install bower by running the command

```sh
npm install bower -g
```
Once you have bower install run the following command in your project's root directory

```sh
bower install
```
You might have to start by sudoing on linux/macos if you get an error.

*Rename the appsettings.sample.json file to appsettings.json and then update it with your corrent database context
settings credentials i.e username, password and database name
