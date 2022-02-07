Story of my project: 

In my system I have two users, one is the Super Admin and the other is the Admin. Both of these users have dashboards. To access users dashboard, we must be registered and logged in. In my system, I validate a phone number that should not be lower than 10 and a unique email address. After successfully registering, registered users cannot log in as superadmin must approve them before they can log in. I have a forget password module that uses both a token and an email, and I use gmail for this module. Admins can log in after super admins activate their accounts, and can add and update items. Admins can check their account details and item details. Items details can be filtered by locally searching and sorting. Admins can check json data calling from HTTP client URL. The super admin can activate or inactivate an admin and can add and update admins' details, as well as view HTTP client URL json data. Admin details and URL json data can be filtered using locally search and sorting.Again, I have a Rest Api module for adding admins, adding items, and viewing admin and item details.

Technical Story:



