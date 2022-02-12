Story of my project: 

In my system I have two users, one is the Super Admin and the other is the Admin. Both of these users have dashboards. To access users dashboard, we must be registered and logged in. In my system, I validate a phone number that should not be lower than 10 and a unique email address. After successfully registering, registered users cannot log in as superadmin must approve them before they can log in. I have a forget password module that uses both a token and an email, and I use gmail for this module. Admins can log in after super admins activate their accounts, and can add and update items. Admins can check their account details and item details. Items details can be filtered by locally searching and sorting. Admins can check json data calling from HTTP client URL. The super admin can activate or inactivate an admin and can add and update admins' details, as well as view HTTP client URL json data. Admin details and URL json data can be filtered using locally search and sorting.Again, I have a Rest Api module for adding admins, adding items, and viewing admin and item details.

System Requirements:

Php version >= PHP 7.4.3 

Composer version >= 2.2.5

Laravel vesion >= 7.2

GuzzleHttp = 7.4

Mysql = 8.0

Apache2 = 2.4


Technical Overview:

1. I use Laravel in the back-end and bootstrap as UI and UI for the dashboard as Adminlte 3.1.0. 
2. I use auth as middleware for login. 
3. I use a two observer class for admin and item to create a unique id for admin and item automatically when admin and item create.
4. I define an observer class in providers, EventServiceProvider.
5. For the forget-password module, I use token and email as Gmail to reset my password.
6. I use GUZZLEhttp to get JSON data from the URL and show the data in the blade.
7. For REST API, I use environment key and value, key as URL and value as http://localhost/
8. So whenever I want to call API, instead of using http://localhost/api/route just simply, I can use {{URL}}api/route
9. In every method I use the try-catch exception to get the error message.
10. For the web route I use the web.php and for the API route I use the api.php.
11. For API, I use error status code 200 as success, 400 as an error.
12. Lastly, I keep separate UI for the front-end and dashboard. Different sidebar menu for Super-admin and admin. And only active users can log in. Super-admin will activate and inactivate the admin. 



