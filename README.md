# Introduction
There are 2 main pages:
- A fully secure admin page where you can:
  - Create a database
  - Display all the database records
  - Search for specific records in the database
- A fully secure and functional contact us page with the option:
  - To fill in and submit a form

Please <a href="https://github.com/K-Konstantinidis/Fully-Secure-Contact-Us-Page/blob/master/READ%20ME.txt" target="_blank">read me</a> to avoid possible errors.
# Table of Contents
1. [Download XAMPP](#Download-XAMPP)
2. [Admin Page](#Admin-Page)
3. [Contact Us Page](#Contact-Us-Page)
4. [LogIn - SignUp - Reset](#LogIn---SignUp---Reset)

# Download XAMPP

<img src = "https://upload.wikimedia.org/wikipedia/commons/d/de/XAMPP_Windows_10.PNG?20181024114430" width=400px height=250px align="right">

###### What is Xampp
```
Xampp is a free and open-source cross-platform web server solution stack package developed by Apache Friends,consisting mainly of the Apache HTTP Server, 
MariaDB database, and interpreters for scripts written in the PHP and Perl programming languages.
```
[Learn More About Xampp](https://en.wikipedia.org/wiki/XAMPP)

[Download xampp](https://www.apachefriends.org/download.html) to try both the form and the admin page.

Here is a [guide](https://www.ionos.com/digitalguide/server/tools/xampp-tutorial-create-your-own-local-test-server/) on how to download, install and set up XAMPP.

# Admin Page

## Admin Index
<img src = "screenshots/adminPage.png" width=400px height=250px>

## Create Database
Just **_click_** the button to create the database.

<img src = "screenshots/dbCreate.png" width=270px height=80px>
  
If there is not a database, the admin cannot search for database records.

<img src = "screenshots/noDatabaseAdmin.png" width=300px height=120px>

## Display All Database Records
`The admin can see all the records in the database`

<img src = "screenshots/databaseRecordsDisplay.png" width=650px>
<img src = "screenshots/databaseRecords.png" width=650px>

## Search Specific Database Records
`The admin can search for specific records in the database`

<img src = "screenshots/specificRecords.png" width=400px> <img src = "screenshots/specificRecords2.png" width=400px height=80px>

# Contact Us Page
## User Index
`The contact us form`

<img src = "screenshots/form1.png" width=400px>
<img src = "screenshots/form2.png" width=400px>

## Submit
`Successful Submit`

<img src = "screenshots/successfully.png" width=550px>

`Empty fields`

<img src = "screenshots/emptyFields.png" width=450px height=250px>

`ERROR: Admin did not create a database`

<img src = "screenshots/noDatabase.png" width=400px height=200px>

# LogIn - SignUp - Reset
## LogIn

<img src = "screenshots/logIn.png" width=350px>

## SignUp

<img src = "screenshots/signUp.png" width=350px>

## Reset Password

<img src = "screenshots/reset.png" width=350px>

## Users
`In the database you can see that every single user (except the admins) have a hash password`

<img src = "screenshots/databaseUsers.png" width=500px>
