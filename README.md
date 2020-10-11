# Mountain Conqueror

Mountain Conqueror is a WordPress starter blog theme. 

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

### Usages of NMP and Gulp
For development purposes, try the command _**npm install**_ and the required packages will be installed. Then command _**gulp**_ and it will generate CSS files from the SCSS files and minify CSS & JS. And it will also watch on the changes for 'assets/scss/*.scss' and 'assets/js/*.js' files. 

### Hooks
The theme has a bunch of helpful action hooks. The list can be found from [HOOKS.md](https://github.com/ohid/mountain-conqueror/blob/main/HOOKS.MD) file.

### How to use the theme
After installing the theme and activating from the WordPress dashboard, now go to **Appearance -> Customize -> Theme Options** to set up it. 

- From **Theme Options -> Header** you can set the site slogan and author name
- From **Theme Options -> Footer Copyright**, **Theme Options -> Footer Social**, and **Theme Options -> Footer Imprint** you can respectively set copyright text, footer social profiles and Imprint(about) page link.


##### Event post type
The theme has a custom post type called "event" which is disabled by default. Add the below code in "wp-config.php" to enable the event post type.
```
define('DUMMY_EVENT', true);
```

### Decisions and thoughts about the theme development process
As per the requirement and based on the design the theme was created. 
- The theme requires to have theme options features, so I have used WordPress's Customizer API. It is very user-friendly minimal. So we do not need to use any third-party plugin or packages that reduces the extra amount of codes and lots of files included in the core theme. 
- We have an _assets/css/event.css_ file that only needs to style for the event archive and single pages. So it doesn't need to load in all pages of the theme. I have given some condition to it so it will only enqueue on the event archive and single page. That will help to reduce some extra bytes in page loading. 
- I have included the Event.php, Location.php, and ContactPerson.php files inside the theme just to make sure all of the features of the theme works fine as we do not have that plugin available at the moment and thus we can show output on the event pages. 
- The theme doesn't have any sidebar and widgets so the sidebar.php file is blank. Registered a widget just to make sure all default functionality of WordPress is enabled, nothing is missed!
- I have designed the comment form and comment lists, pingback lists. But the comments_template() function is commented out on "templates/article.php" file at line no 72. Designing the comments template wasn't a part of the application task but I thought it would be a good addition to make the theme proper.

### Changelog
v1.0.1 - 11th October 2020
- Made the comments template hidden
- Some other minor changes

v1.0.0 - 11th October 2020
- First release of the theme

