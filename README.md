# Proshore Assignment Readme
# Author: Rabi Gorkhali

## File Structure

Here's a breakdown of the main directories:

- **application-file:** This directory mirrors the Laravel folder structure. You should execute all commands related to the application (except Git commands) within this folder.

This structure is designed to segregate different components of the system, such as front-end, API, Docker files, etc., if they are added in the future.

## HOW TO SETUP
# STEP1
- clone repo from https://github.com/rabigorkhali/proshore-assignment.git

# STEP2
-make .env file. copy it from .env.example and make necessary changes like (app_url, database configs,etc)
-for email to work please put valid mail config

# STEP3

Hit following command at --- cd application-files/
 ```
    `composer install`
    `php artisan key:generate`
    `php artisan migrate`
    `php artisan db:seed`
    `npm install` 
    `npm run dev`<!-- hit this command if css breaks, however compilled css and js files are already pushed -->
 ```

## STEP 4
Now run the application via serve or by going to project url (localhost/proshore-assignment/public)<br>
`php artisan serve`

## Login Information
<p>--Default user credentials:--</p>
<p>email:examadmin@proshore.com <br>
password:123admin@</p>

## SOME MORE INFO 
  <p>Place the hooks folder content inside folder .git/hooks (unix platform commands is given below)</p>
 ```
        cp ./hooks/* ./.git/hooks 
        // Making sure the file is executable
        sudo chmod +x ./.git/hooks/pre-commit
 ```
 <p>Use bellow command to check if any minor fixes need to be done </p>
  ```
       composer sniff
 ```
 <p>Use bellow command to fix the problems </p>
  ```
       composer lint
 ```