# ezyVet Coding challenge

## Requirements
- The cart will need to keep it’s “state” during page loads / refreshes
- List Products – these should be listed at all times to allow adding of products
- Products should be listed in this format: product name, price, link to add product
- Must be able to add a product to the cart
- Must be able to view current products in the cart
- Cart products should be listed in this format: product name, price, quantity, total, remove link
- Product totals should be tallied to give an overall total
- Must be able to remove a product from the cart
- Adding an existing product will only update existing cart product quantity (e.g. adding the same product twice will NOT create two cart items)
- All prices should be displayed to 2 decimal places
- Error checking will be set to strict for viewing completed code
- Project will work as expected in PHP 5.3+

## Application Structure
Project is developed in a MVC fashion; however, Model/Controller functions are replaced by handlers scripts due to project simplicity.
```
handlers/                handle requests and URL forward
helpers/                 classes to help on putting raw data into proper form
sessions/                stored session data files
views/                   HTML partial files
index.php                Application entry point
readme.md                Application Description
```

## Supplied data
```
$products = array(
    array(“name” => “Sledgehammer”, “price” => 125.75),
    array(“name” => “Axe”, “price” => 190.50),
    array(“name” => “Bandsaw”, “price” => 562.13),
    array(“name” => “Chisel”, “price” => 12.9),
    array(“name” => “Hacksaw”, “price” => 18.45)
);
```

## Brief User Instruction
The shopping cart is quite straightforward. It allows user to add/remove items into/from the cart. As soon as shopping cart changes, cart will populate the total cost of the cart.

## Some Issues
I have few questions about the project. I think it would be great to get some feedback from code review. I created a helper class to resolve the issues without modifying the supplied data.
- PHP7 indicates warning messages on supplied data. PHP detects (”) is used instead of double quotes (").
- The prices of supplied data needs to be formatted into 2dp to display price.

## Deployment and test
Testing deployment work is done via docker commands. There are different methods to test app compatibility via following commands

```
# cd to project root
cd ~/$PROJECT_ROOT
# allow www to write session file to sessions folder
chmod 777 sessions
```

#### Test in PHP7.2
```
docker run --rm -p 8000:80 -v $(pwd):/var/www/html php:apache
```

#### Test in PHP5.3
```
docker run --rm -p 8000:80 -v $(pwd):/var/www/html eugeneware/php-5.3
```
#### After test, the new installed docker images can be viewed via following command
```
docker images
```
#### Delete unnecessary docker images (optional)
```
docker rmi eugeneware/php-5.3
docker rmi php:apache
```
