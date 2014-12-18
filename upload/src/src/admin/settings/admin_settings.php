<?php
	// settings form

	// automatic driver detection
	if ( $handle = opendir('src/drivers/') ) {
		$driver = "<option value=\"$db_driver\">$db_driver</option>";

		while ( false !== ($file = readdir($handle)) ) {
			if ( $file != '.' & $file != '..' & $file != 'index.html' ) {
				$file = basename($file, '.php');

				if ( $file != $db_driver ) {
					$driver = $driver."<option value=\"$file\">$file</option>";
				}
			}
		}

		closedir($handle);
	}

	// automatic skin detection
	if ( $handle = opendir('src/layout/skins/') ) {
		$skin_list = "<option value=\"$default_skin\">$default_skin</option>";

		while ( false !== ($file = readdir($handle)) ) {
			if ( $file != '.' & $file != '..' & $file != 'index.html' ) {

				if ( $file != $default_skin ) {
					$skin_list = $skin_list."<option value=\"$file\">$file</option>";
				}
			}
		}

		closedir($handle);
	}

	// automatic module detection
	$test = 0;
	$mod_list = '<select name="modules_startup">';

	if ( $handle = opendir('src/modules/') ) {
		while ( false !== ($module = readdir($handle)) ) {
			if ( $module != '.' & $module != '..' & $module != 'index.html' ) {
				include("src/modules/$module/mod_file.php");

				if ( $module != $modules_startup & $test ==  0 ) {
					$mod_list2 = $mod_list2."<option value=\"$module\">$mod_title</option>";
				} elseif ( $module == $modules_startup ) {
					$test = 1;
					$mod_list = $mod_list."<option value=\"$module\">$mod_title</option>".$mod_list2;
				} else {
					$mod_list = $mod_list."<option value=\"$module\">$mod_title</option>";
				}
			}
		}

		closedir($handle);
	}

	if ( $test == 0 ) {
		$mod_list = $mod_list.'<option value="">None Selected</option>'.$mod_list2.'</select>';
	} else {
		$mod_list = $mod_list.'<option value="">None Selected</option></select>';
	}
?>
  <center>
  <table width="70%" class="dashed_head">
  <tr>
    <td><img src="src/src/admin/settings/settings.gif"></td><td><strong>Modify Settings</strong><br>Use this utility to adjust ContentOne to your needs. If you ave any questions refer to the manual, <a href="#manual">here</a>.</td>
  </tr>
  </table>
  <form method="post" action="index.php?action=settings&id=save">
    <fieldset class="snippit">
    <legend><strong>Website Settings</strong></legend>
      <table border="0">
      <tr><td width="110">Site Title:</td><td width="220"><input type="text" name="site" size="40" value="<?php echo $site; ?>"></td><td><span class="type2"> - In this field, type the full name of your website.</span></td></tr>
      <tr><td>Site URL:</td><td><input type="text" name="site_url" size="40" value="<?php echo $site_url; ?>"></td><td><span class="type2"> - Type the full url (address) to your website. A trailing slash is not required.</span></td></tr>
      <tr><td>URL to CMS Folder:</td><td><input type="text" name="site_contenturl" size="40" value="<?php echo $site_contenturl; ?>"></td><td><span class="type2"> - Type the full url (address) to the location of the content manager files. A trailing slash is not required.</span></td></tr>
      <tr><td>CMS Folder:</td><td><input type="text" name="site_contentfolder" size="20" value="<?php echo $site_contentfolder; ?>"></td><td><span class="type2"> - Type the relative address from your main site to the content manager. A trailing slash is not required.</span></td></tr>
      </table>
    </fieldset>

    <fieldset class="snippit">
    <legend><strong>Database Settings</strong></legend>
      <table border="0">
      <tr><td width="110">Driver:</td><td><select name="db_driver"><?php echo $driver; ?></select></td><td><span class="type2"> - Select the database driver that your server is using. See the help files for more information.</span></td></tr>
      <tr><td>Hostname:</td><td width="220"><input type="text" name="db_host" size="20" value="<?php echo $db_host; ?>"></td><td><span class="type2"> - This field requires the url (address) of your database. (It should be the one you ran the database install on.)</span></td></tr>
      <tr><td>Username:</td><td><input type="text" name="db_user" size="20" value="<?php echo $db_user; ?>"></td><td><span class="type2"> - This is the user that has full access rights to your database.</span></td></tr>
      <tr><td>Password</td><td><input type="password" name="db_pass" size="20" value="<?php echo $db_pass; ?>"></td><td><span class="type2"> - This is the password for the user above.</span></td></tr>
      <tr><td>Database:</td><td><input type="text" name="db_database" size="20" value="<?php echo $db_database; ?>"></td><td><span class="type2"> - Once logged into the database server, there needs to be a database where all of the content manager files are stored. Type that here.</span></td></tr>
      </table>
    </fieldset>

    <fieldset class="snippit">
    <legend><strong>User Settings</strong></legend>
      <table border="0">
      <tr><td width="110">Registration:</td><td width="218"><select name="registration"><?php if ( $registration == 1 ) { ?><option value="1">Enable</option><option value="0">Disable</option><?php } else { ?><option value="0">Disable</option><option value="1">Enable</option><?php } ?></select></td><td><span class="type2"> - Select whether to allow users to register with your user database or not.</span></td></tr>
      <tr><td width="110">Guest Avatar:</td><td><input type="text" name="guest_avatar" size="40" value="<?php echo $guest_avatar; ?>"></td><td><span class="type2"> - This is the full url (address) to the image that is displayed if a user is considered a guest. This is not affected by the maximum avatar sizes.</span></td></tr>
      <tr><td>Width Limit:</td><td><input type="text" name="avatar_width" size="3" maxlength="3" value="<?php echo $avatar_width; ?>"></td><td><span class="type2"> - Specifies the maximum width allowed for avatars. Typing nothing or 0 will cause avatars to have an unlimited width.</span></td></tr>
      <tr><td>Height Limit:</td><td><input type="text" name="avatar_height" size="3" maxlength="3" value="<?php echo $avatar_height; ?>"></td><td><span class="type2"> - Specifies the maximum height allowed for avatars. Typing nothing or 0 will cause avatars to have an unlimited height.</span></td></tr>
      </table>
    </fieldset>

    <fieldset class="snippit">
    <legend><strong>News Settings</strong></legend>
      <table border="0">
      <tr><td width="110">HTML Use:</td><td width="218"><select name="news_html"><?php if ( $news_html == 1 ) { ?><option value="1">Enable</option><option value="0">Disable</option><?php } else { ?><option value="0">Disable</option><option value="1">Enable</option><?php } ?></select></td><td><span class="type2"> - Gives the option to enable/disable the use of HTML in news posts. It is recommended that you disable it for security reasons.</span></td></tr>
      <tr><td>Comments<br />HTML Use:</td><td><select name="news_comments_html"><?php if ( $news_comments_html == 1 ) { ?><option value="1">Enable</option><option value="0">Disable</option><?php } else { ?><option value="0">Disable</option><option value="1">Enable</option><?php } ?></select></td><td><span class="type2"> - Gives the option to enable/disable the use of HTML in comments. It is HIGHLY recommended that this option remains disabled.</span></td></tr>
      <tr><td>News Display:</td><td><select name="news_display"><?php if ( $news_display == 2 ) { ?><option value="2">Day Based</option><option value="1">Standard</option><?php } else { ?><option value="1">Standard</option><option value="2">Day Based</option><?php } ?></select></td><td><span class="type2"> - Select whether you would like to use the standard news template in displaying your news or if you want to have each post displayed differently based on what day it was posted on.</span></td></tr>
      <tr><td>Number Displayed:</td><td><input type="text" name="news_posts" size="20" value="<?php echo $news_posts; ?>"></td><td><span class="type2"> - Determines the number of news posts that are displayed on the front page. Up to an excessive 999, but 10 or less is recommended.</span></td></tr>
      <tr><td>Date Format:</td><td><input type="text" name="date_format" size="20" value="<?php echo $date_format; ?>"></td><td><span class="type2"> - At certain times a specific format for dates and times are required. Here you can modify how it is displayed. Click <a href="http://www.php.net/manual/en/function.date.php" target="new">here</a> for more information.</span></td></tr>
      </table>
    </fieldset>

    <fieldset class="snippit">
    <legend><strong>Other</strong></legend>
      <table border="0">
      <tr><td width="110">Default Skin:</td><td width="220"><select name="skin"><?php echo $skin_list; ?></select></td><td><span class="type2"> - Type the title of your content manager skin here. Check the help files for more information. Typing nothing or 'default' will cause the default skin to load.</span></td></tr>
      <tr><td>Startup Module:</td><td><?php echo $mod_list; ?></td><td><span class="type2"> - Select a module to startup with the Content Manager on the main page.</span></td></tr>
      <tr><td colspan="3"><span class="type3"><strong>Warning!</strong> Be careful and doublecheck your settings. If any thing is wrong, you may be locked out of openSite.</span></td></tr>
      <tr><td colspan="3"><input type="submit" name="Save" value="Save Settings" style="width: 100px;" class="button">&nbsp;&nbsp;<input type="reset" name="Default" value="Reset Settings" style="width: 100px;" class="button"></td></tr>
      </table>
    </fieldset>
  </form>
  </center>