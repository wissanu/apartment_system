# Requirement for this project (Small Apartment).

- xampp 7.4.12
- composer (for install mpdf library)

# Mac set up environment for composer and install mpdf library.

Find out what version of PHP is running

* [x] : which php

This will output the path to the default PHP install which comes preinstalled by Mac OS X, by default

* [x] : /usr/bin/php

Now, we just need to swap this over to the PHP that is installed with XAMPP, which is located at /Applications/XAMPP/bin

* [x] : vim ~/.bash_profile

Type i and then paste the following at the top of the file:

* [x] : export PATH=/Applications/XAMPP/bin:$PATH

Hit ESC, Type :wq, and hit Enter

In Terminal, run source ~/.bash_profile

In Terminal, type in which php again and look for the updated string. If everything was successful, It should output the new path to XAMPP PHP install.

Now, install composer.
* [x] : curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin

How to use composer command?

* [x] : php /usr/local/bin/composer.phar


# progress

* [x] : 1. Log in for admin
* [x] : 2. Report page for insight information.
* [x] : 3. Create and management room page.
* [x] : 4. Apply a customer to room.
* [x] : 5. Lease management
* [x] : 6. Calculate price of each room.
* [x] : 7. Generate bill and print.
* [x] : 8. Check status of each room.
