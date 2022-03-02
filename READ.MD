# Accept a Payment

Build a simple checkout form to collect payment details. Included are some basic
build and run scripts you can use to start up the application.

Modified the build process for the thank you message to disappear after 10 seconds

Used pure vanilla JS to handle client side interaction - use localstorage to act as DB

PHP as the server.

## Running the App

1. Set Up Files
cd public 
composer install
~~~

~~~

2. Run the server
docker-compose up --build
clear browser cache 
~~~

~~~

3. Go to [http://localhost:8080]
- Test Card Number: 4242424242424242

## Extra Notes (how to improve)
- Build a DB - and use the PHP scripts to create customer and store the customer in stripe dashboard (aswell as payment)
- Use React on the client side to handle the client form interactivity.  
