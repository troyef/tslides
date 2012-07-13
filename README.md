tslides
=======

This is more or less a simple slideshow web application I created to easily display a slideshow of uploaded images. This was built for experimentation with Code Igniter and is not meant to be a fully formed application, but more as an exercise for me.

This web app was built using and depends on Code Igniter (http://codeigniter.com/).

To install:

1. Drop the Code Igniter framework in the web server folder you will be serving from.

2. Drop the contents of this repo in that same folder, overwriting the application folder.

3. Modify the $config['base_url'] setting in the application/config/config.php file, per the Code Igniter installation instructions (http://codeigniter.com/user_guide/installation/index.html).

You are now ready to roll.  But you need images to display. To add an image gallery:

4: Add a folder to the existing img folder. Make sure the folder you add is writeable by the webserver.

5: In the application/controllers/tslides.php file, add the foldername and corresponding galleryname to the $galleries hash near the top of the file. There is a commented out example under the variable in the file.

6: Add images to the new folder you added.

You can add as many galleries and images as you would like.

View the index page that displays your galleries at http://yourSite/ or http://yourSite/index.php

A gallery can be viewed at http://yourSite/index.php/galleryname

Captions can be edited at http://yourSite/index.php/admin/galleryname

Note that the caption editing page is not secure.  So anyone who knows to go there can add whatever captions they wish.
