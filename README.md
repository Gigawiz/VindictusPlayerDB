# VindictusScamDB
VindictusScamDB is the first database of known scammers on the game vindictus. The script is written with PHP, Html, Javascript, AJAX and MySql.

The code posted here is live on our site and released so others can see some of the work put into VindictusScamDB. Feel free to submit issues or suggestions and I will attempt to fix/implement them.

Please note, there are now 2 databases included. 
"vindictusscamdb_example_data" contains the structure of the database, with an example entry in settings. This is only to be used if you are unsure how to use the settings table (although it is pretty straight forward). 

"vindictusscamdb_structure" contains only the structure and should be the table you use to run the script. Please note that some of the table structure has changed and may overwrite your current data.


New in V2.1 RC1 (Alot has been changed, and yes this is all the same release.):

05/27/2016
Replaced hardcoded 'Welcome to Vindictus Scam DB' with 'Welcome To [site title from database]'
Replaced hardcoded description of site on homepage ('Vindictus Scam DB is a free service dedicated to eradicating NX & Gold Scammers from Vindictus.') with Site Description in database
Removed $_BETA config and beta sql entry. Only to be used for the official site and un-necessary code for release
Added 'scammer_activity' table for future changes to 'scammer profile'
Cleaned up 'Scammer Profile Page', arranged all data and displayed accordingly
Removed 'Amount Scammed' from table and placed in 'Scammer Profile'
Added 'email' field to submit form
Added 'email' field to 'scammers' and 'submissions' tables. Only filled if user adds an email to the submit form.
Added function to send an email without needing to rewrite mail code repeatedly
Added function to log all outgoing emails
Added 'emails' table to db to log all outgoing emails
Added $_SMTP array to config
'server' is your smtp server
each email password combo goes in a new line
'email@domain.com'=>'password',
'email2@domain2.com' => 'password2'

05/20/2016
Reworked meta 'Keywords' and 'Description' with help from a friend
Fixed bug in submit form where 'Amount Scammed' would not be put in the database
Added code to clear Submission Form after successful Submit
Added 'Enabled' field to 'Adsense_ad_locations' table to allow for individual ads being turned on or off
Fixed bug in changelog where first double quote will be changed to a single quote, now replaces all double quotes with single quotes

05/19/2016
Started work on 'Scammer Profile Page'
Fixed typo's in 'FAQ', anything in quotes had \ before it
Removed 'Contact Us' from FAQ
Added 'Contact Us' Menu option
Added details to the 'Contact Us' page
Added mention of the Vindictus Discord Server to the 'Contact Us' details

05/15/2016
Noticed typo on homepage in header '[...and the Beta version is now closed to the public.]', removed from homepage on live site & Beta
Reworked changelog function to differentiate between current releases and planned releases
Moved functions from 'config.php' to 'functions.php'
Created 'genMenu()' to generate menu's from the database
Removed '$_MENU' and '$_MENUSTYLE' arrays from config, now handled by function and database
Moved FAQ to Database
Removed '$_FAQ' array from config
Added getFaq() function
Added 'settings' table to database
Added getSetting function to retrieve site settings from database
Replaced info in $_SITE, $_BETA and $_GOOGLE with getSetting() function (will replace arrays all together in the near future)
Added reCaptcha to submit form
Added 'checkca.php' to check captcha response
Replaced 'XMLHttpRequest' with Ajax
Removed 'OnClick' function from submit button
Added option in config to disable reCaptcha

05/15/2016
Added 'changelog', 'traffic' and 'users' tables to MySql database
Removed 'ip2country', 'scammers_beta' and 'submissions_backup' tables from database.
Added 2 record limit to changelog, showing last 2 updates.
Added 'View Full Changelog' button that opens a featherlight text box with full changelog
Added 'Changelog' to menu
Added $_MENUSTYLE Array to config, handles any styling for built in menu option. Will move to DB in future
Added 'Sign Up' button to header (using new styling array). Will not function until tomorrow's user system addition
Added 'menu_entries' table to database and populated with current menu entries
Added Dynamic Sitemap based off Menu entries, scammers & scammers alternate characters in database

05/15/2016
Added IP based tracking to site
Started work on admin panel
Added 'Beta Revision Difference Checking' to homepage
Added 'beta' to $_SITE array. Will only display beta message on main site.
Added 'version', 'vers_major' and 'vers_minor' to $_SITE array. Used for beta revision checking
Added $_BETA array, used for version checking
Added 'ad_spots' to $_GOOGLE array. Set to false to turn off ads.