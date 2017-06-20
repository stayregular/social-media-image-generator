# social-media-image-generator
Generates an image from HTML form data for Social Media promotion

We live in an age where any person - with or without design experience - is capable of creating high quality designs with the assistance of tools and resources. There are plenty of phone apps out there that create graphics, and now services like Crello exist to cater to the more hands-on creators. But what do you do for a client that doesn’t want to play around with a bunch of apps to achieve graphics that don’t even match the brand’s style guide properly? You make your own graphic generator with templates custom tailored to the clients brand.

We often provide clients with graphic assets for social media, it’s a normal part of a branding package. But what does a client do when they have to make a quick Instagram announcement? If they’ve got the time and tech savvy, they use the apps I mentioned above. More than likely though? A screenshot of a notepad document on their phone. It looks unprofessional and doesn’t convey as much brand confidence as a properly styled graphic.

That’s where our graphic generator comes into play. 

# Teach them to fish, or design a fishing machine

The concept was incredibly simple. An HTML input would feed data to a simple PHP app that spit the data out in a more styled form. The kicker? Using a javascript library to take a screenshot of the HTML output and generate an image for the client to save for Instagram.

# INSTALLATION

Upload all files to a web server with PHP and Image Magick enabled. Make a folder called 'tmp' in the same folder and CHMOD with write privileges. Navigate to index.php in your browser and play with the app!

# HOW TO USE

1. Put text into the text fields. 
2. Put an image URL into the background image field. 
3. Press submit. 
4. ???
5. Profit?

# Thanks to 
[HTML2Canvas](https://html2canvas.hertzen.com/)

# Looking for more?

[Check out our guide on creating this app on our website.](http://stayregular.net/blog/social-media-image-generator-with-javascript-and-php)
