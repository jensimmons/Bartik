// $Id$

EDITING THIS THEME

You can customize this theme to make it more your own. But do not edit this 
original copy of Bartik. Duplicate the Bartik directory (the folder) with all of 
it's files, move your new copy to the sites/all/themes directory, and edit it there. 
Be sure to rename your new theme by changing the name of the directory, changing 
the name of the .info file, and editing the text inside the .info file.

If you are running a multisite installation, you can place the new theme in in a 
subdirectory under /sites/{sitename}/themes/, where {sitename} is the name of your 
site (e.g., www.example.com).

If you edit this copy of Bartik, you are "hacking core". Do not hack core.

If you hack core, and edit the original copy of Bartik, updating Drupal will be 
much harder, and you risk having your new theme deleted in the process.

For more details, see: http://drupal.org/node/176043


CHANGING THE COLOR.CSS FILE

If you adjust the colors using the color scheme tool in Bartik's theme settings, 
the color.css file will be duplicated and the new copy will be placed in 
default/sites/files/. It is this new copy that will have the CSS for the colors 
you specified. The original copy of color.css will stay in themes/bartik/css/, 
but will no longer have any impact on the site's display. 

If you are having trouble making changes directly to the stylesheet, if you are 
making changes but they aren't having an effect, then try turning color module 
off in the modules administration area.