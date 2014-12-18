<?php
	// manual settings file installation
	// - some options have been set already as examples
	// - it's recommended that you set all options below $db_database from within openSite
	// - this page loses all of its comments as soon as you save your settings from within openSite

	$site = '';                                             // $site - the title of your website
	$site_url = 'http://www.primalfusion.net';              // $site_url - the full url of your website (trailing slash is not required)
	$site_contenturl = 'http://www.primalfusion.net/os';    // $site_contenturl - the full url to the location of openSite (trailing slash is not required)
	$site_contentfolder = 'os';                             // $site_contentfolder - the difference between the site_url and the site_contenturl
	$db_driver = 'MySQLi';                                  // $db_driver - the driver that openSite uses to connect to your database, choices are 'MySQL' or 'MySQLi'
	$db_host = 'localhost';                                 // $db_host - the location of your MySQL database, typically 'localhost'
	$db_user = 'root';                                      // $db_user - the user that you use to login to the MySQL server
	$db_pass = '';                                          // $db_pass - the password for the user that you are using to connect to the MySQL server
	$db_database = '';                                      // $db_database - the name of the database where the tables are stored
	$registration = '0';                                    // $registration - enables/disables user registration, options are '0' or '1'
	$guest_avatar = 'src/images/avatars/guest100x100.gif';  // $guest_avatar - the location of avatar that all non-member users will display
	$avatar_width = '100';                                  // $avatar_width - the maximum width of user avatars
	$avatar_height = '100';                                 // $avatar_height - the maximum height of user avatars
	$news_html = '0';                                       // $news_html - enables/disables html in news posts, options are '0' or '1'
	$news_comments_html = '0';                              // $news_comments_html - enables/disables html in comments, options are '0' or '1'
	$news_display = '1';					// $news_display - determines what type of news will be displayed, options are '1' for standard news and '2' for day based news
	$news_posts = '5';					// $news_posts - the number of news posts that will be displayed
	$date_format = 'F j, Y \a\t g:ia';			// $date_format - determines the format for dates whenever they are displayed except on day based news pages
	$skin = 'default';					// $skin - determines the default os skin (may be changed by each user individually, however)
	$modules_startup = '';					// $modules_startup - loads whatever module is set on the main os page
?>