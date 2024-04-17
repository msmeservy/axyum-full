
# Axyum Theme for WordPress
## Axyum is a custom theme built on top of the underscores theme https://underscores.me/

This is a WordPress theme built on top of the Underscores starter theme.  I created this theme to try to make building and using WordPress sites easier for the developer and the user.  The theme is still pretty bare bones for the developer but there is some starter code to make setup easer for menus and mobile navigation.  Here are some of the included features:

* Desktop and Mobile navigation are setup for one menu depth
* there is a default internal page header that can be easily updated
* there is a sticky desktop navigation bar already setup
* there are css files separated out for different the sections to make coding more organized -  atf.css (above the fold), header.css, home.css, internal.css and footer.css
* there is a built-in global custom fields section that can be accessed in the back end of WordPress.  This makes it so you can update the website content easily inside wordpress without need to access the back end of the site. (this would be sections that would normally be hard coded in the html and would require access to the back end code - see below)
* This theme includes Bootstap for easy mobile responiveness
  
## intstall instructions
If you want to install this theme do the following:
1. download the zip file and rename it to "axyum-full"
2. login to the dashboard of your WordPress site
3. on the right-side menu select Appearance > Themes
4. at the top click the "Add New Theme" button
5. click on the "Upload Theme"
6. find the "axyum-full" zip folder on your and click install
7. then activate

## Global Custom fields
As stated above, the global custom fields can be utilized to make it easier to update website content for anyone who can access the back end of WordPress.  You access this pages by doing the following:
* click on settings and then clicking on global custom fields.  
* I have some generic fields already build in that can be used easily.
* A couple of the custom fields are setup in the bannerarea of the template so you can see the format.
* To customize the global custom fields page in WordPress, Open up functions.php in the theme directory navigate down to line 266
* Hopefully this makes for an easily editable template.
** When adding new custom fields, make sure to add the field name down at the bottom as well in the "input" name "page_options" **

## Navigation
When creating a menu make sure to check both boxes under display location for Primay and Mobile.  This will make sure the styles are applied

## Fonts
These are the included Fonts:
* Montserrat
* Poppins
* Raleway
* Oswald
* Lato

## Issues in progress
I am working on overall cleaning things up but I'm specifically working on the following:
* updating the mobile navigation to work at depths deeper than one.
  
