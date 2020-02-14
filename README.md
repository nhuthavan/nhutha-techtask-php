# Requirements
Symfony Framework version >=4.4
PHP version >= 7.2
# Installation
  __1. Install Git, Composer __
  __2. Clone or download project files __
    Using this command for clone: git clone 
  __3. Install composer
    composer install
    __4. Run Symfony Server
    symfony server:start
    __5. Test on browser
     Access to http://127.0.0.1:8000/lunch
     __6. For test
     http://127.0.0.1:8000/rest-api/lunch?best-before=2019_03_28
     http://127.0.0.1:8000/rest-api/lunch?use-by=2019-03-07
     http://127.0.0.1:8000/rest-api/lunch?use-by=2019-03-25
     __7. Unit test 
     php bin/phpunit tests/LunchControllerTest.php

     
  
  
