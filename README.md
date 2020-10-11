# Mountain Conqueror

Mountain Conqueror is a WordPress started blog theme. 

### Installation process

The theme can be installed via _**git clone**_ and _**composer require**_ method.

###### Git clone method
To install it via the _**git clone**_ method please follow the below instructions.

Go to /wp-content/themes directory then give the below command
``` 
git clone https://github.com/ohid/mountain-conqueror.git
```
Then go to the _mountain-conqueror_ directory using the following command
```
cd mountain-conqueror
```
Now install the composer required packages using the following command
```
composer install
```

###### Composer require method
To install it via the _**composer require**_ method please follow the below instructions
```
composer config repositories.repo-name vcs git@github.com:ohid/mountain-conqueror.git
```
Now require the theme package using the following command:
```
composer require ohid/mountain-conqueror
```

### Hooks
The theme has a bunch of helpful action hooks. The list can be found from [HOOKS.md](https://github.com/ohid/mountain-conqueror/blob/main/HOOKS.MD) file.

### Event post type
The theme has a custom post type called "event" which is disabled by default. Add the below code in "wp-config.php" to enable event post type.
```
define('DUMMY_EVENT', true);
```

### Changelog
v1.0.0 - 11th October 2020
- First release of the theme