<?php
	// openSite Installation Script v0.2.2

	error_reporting('2037');

	$action = $_GET['action'];
	$skin = 'default';

	include('../src/functions.php');

	$header = implode('', file("default/header.php"));
	$header = str_replace('{title}', 'Primal Fusion openSite Installation', $header);
	$header = str_replace('{linkbar}', 'Primal Fusion openSite Installation&nbsp;&nbsp;', $header);
	echo $header;

	if ( $action == 'step1' ) {
		// STEP ONE: File Structure Integrity Check

		$file[0] = '../src/data/settings.php';
		$file[1] = '../src/data/layouts/default/404.php';
		$file[2] = '../src/data/layouts/default/default.php';
		$file[3] = '../src/data/layouts/default/default.php';
		$file[4] = '../src/data/layouts/default/news.php';
		$file[5] = '../src/data/layouts/default/news_day.php';
		$file[6] = '../src/data/layouts/default/news_day_header.php';
		$file[7] = '../src/data/layouts/default/news_day_settings.php';

		$kill = 0;
		$count = 0;
		$array = count($file);
?>
  <strong>&raquo; Step One: File Structure Integrity Check</strong><br />
  The first step in installing openSite is to create all of the necessary files needed to properly run the program. Below is a test to make sure that openSite is still able to write to its files and is able to function as it has been designed. If any file fails to pass the test, then the entire installation will fail. In order to fixt the problem, make sure that the file is chmodded to '755' (or Read, Write, and Execute for Owner, Read and Execute for Group, and Read and Execute for Users).
  <p>
    <table>
    <tr>
      <td width="275">
        <strong>System File</strong>
      </td>
      <td>
        <strong>Writable</strong>
      </td>
    </tr>
<?php
		while ( $count < $array ) {
			$check = $file["$count"];
			$test = is_writable($check);
			$display = explode('./', $check);

			if ( $test == 1 ) {
				$test = '<span style="color: green">yes</span>';
			} else {
				$test = '<span style="color: red">no</span>';
				$kill = 1;
			}
?>
    <tr>
      <td>
        <?php echo $display[1]; ?>
      </td>
      <td>
        <?php echo $test; ?>
      </td>
    </tr>
<?php
			$count++;
		}
?>
    </table>
  </p>
  <p>
<?php
		if ( $kill == 0 ) {
?>
    <form method="post" action="index.php?action=step2">
      <div style="text-align: center;"><input type="submit" name="Continue" value="Continue &raquo;" class="button" style="width: 150px;" /></div>
    </form>
<?php
		} else {
?>
    <div style="text-align: center; color: red;">The test has Failed. Please check your file structure before continuing.</div>
<?php
		}
?>
  </p>
<?php
	} elseif ( $action == 'step2' ) {
		// STEP TWO: Settings Modification
		$site_url = 'http://'.$_SERVER['HTTP_HOST'];
		$site_contenturl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$site_contenturl = explode('/install/index.php', $site_contenturl);
		$site_contentfolder = explode('/install/index.php', $_SERVER['PHP_SELF']);
		$site_contentfolder = $site_contentfolder[0];
		$pos = strpos($site_contentfolder, '/');

		if ( $pos == '0' & $pos !== false ) {
			$site_contentfolder = substr($site_contentfolder, 1);
		}

		$db_host = get_cfg_var('mysqli.default_host');
		$db_user = get_cfg_var('mysqli.default_user');
		$db_pass = get_cfg_var('mysqli.default_pass');

		if ( !$db_host ) {
			$db_host = 'localhost';
		}
?>
  <strong>&raquo; Step Two: Settings Modification</strong><br />
  The information contained on this page is necessary to get your installation of openSite working fully. There are other settings that aren't as important that may be modified from within openSite itself. The settings marked with an asterisk (*) have been autodetected. If they are incorrect, please make the correction so that your script works as intended.
  <p>
    <form method="post" action="index.php?action=step3">
      <fieldset class="snippit">
      <legend><strong>Website Settings</strong></legend>
        <table border="0">
        <tr><td width="110">Site Title:</td><td width="220"><input type="text" name="site" size="40" value="<?php echo $site; ?>"></td><td><span class="type2"> - In this field, type the full name of your website.</span></td></tr>
        <tr><td>*Site URL:</td><td><input type="text" name="site_url" size="40" value="<?php echo $site_url; ?>"></td><td><span class="type2"> - Type the full url (address) to your website. A trailing slash is not required.</span></td></tr>
        <tr><td>*URL to CMS Folder:</td><td><input type="text" name="site_contenturl" size="40" value="<?php echo $site_contenturl[0]; ?>"></td><td><span class="type2"> - Type the full url (address) to the location of the content manager files. A trailing slash is not required.</span></td></tr>
        <tr><td>*CMS Folder:</td><td><input type="text" name="site_contentfolder" size="20" value="<?php echo $site_contentfolder; ?>"></td><td><span class="type2"> - Type the relative address from your main site to the content manager. This is basically the difference between the Site URL and URL to CMS Folder variables. A trailing slash is not required.</span></td></tr>
        </table>
      </fieldset>
      <fieldset class="snippit">
      <legend><strong>Database Settings</strong></legend>
        <table border="0">
        <tr><td>*Hostname:</td><td width="220"><input type="text" name="db_host" size="20" value="<?php echo $db_host; ?>"></td><td><span class="type2"> - This field requires the url (address) of your database. (The database installation will be run on this server.)</span></td></tr>
        <tr><td>*Username:</td><td><input type="text" name="db_user" size="20" value="<?php echo $db_user; ?>"></td><td><span class="type2"> - This is the user that has full access rights to your database.</span></td></tr>
        <tr><td>*Password</td><td><input type="password" name="db_pass" size="20" value="<?php echo $db_pass; ?>"></td><td><span class="type2"> - This is the password for the user above.</span></td></tr>
        <tr><td>Database:</td><td><input type="text" name="db_database" size="20"></td><td><span class="type2"> - Once logged into the database server, there needs to be a database where all of the content manager files are stored. Type that here.</span></td></tr>
        <tr><td>Driver:</td><td><select name="db_driver"><option value="0">Automatic</option><option value="1">MySQLi</option><option value="2">MySQL</option></select></td><td><span class="type2"> - It's recommended that you use the automatic option, but if you're having problems with the system, you can manually select your driver.</span></td></tr>
        <tr><td colspan="3"><input type="submit" name="Save" value="Save Settings" style="width: 100px;" class="button">&nbsp;&nbsp;<input type="reset" name="Default" value="Reset Settings" style="width: 100px;" class="button"></td></tr>
        </table>
      </fieldset>
    </form>
  </p>
<?php
	} elseif ( $action == 'step3' ) {
?>
  <strong>&raquo; Step Two: Settings Modification</strong><br />
<?php
		$db_host = $_POST['db_host'];
		$db_user = $_POST['db_user'];
		$db_pass = $_POST['db_pass'];
		$db_database = $_POST['db_database'];
		$db_driver = $_POST['db_driver'];

		if ( !$_POST['site'] | !$_POST['site_url'] | !$_POST['site_contenturl'] | !db_host | !$db_user | !$db_pass | !$db_database ) {
			error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Step 2">here</a> to return.');
		} else {
			echo 'All of your settings have been saved successfully. ';
		}

		if ( ( function_exists('mysqli_connect') & $db_driver == '0' ) | $db_driver == '1' ) {
			if ( $mysqli_link = mysqli_connect($db_host,$db_user,$db_pass) ) {
				if ( mysqli_select_db($mysqli_link,$db_database) ) {
					echo 'openSite <span style="color: green;">succeeded</span> in connecting to your database and has detected that you are using a MySQL database that is v4.1 or higher and works with the <strong>MySQLi</strong> extension. Your settings have been updated with this change. Click below to continue.';
					$db_driver = 'MySQLi';
				} else {
					$db_driver = '3';
				}

				mysqli_close();
			} else {
				$db_driver = '3';
			}
		}

		if ( ( function_exists('mysql_connect') & $db_driver == '0' ) | $db_driver == '2' ) {
			if ( mysql_connect($db_host,$db_user,$db_pass) & mysql_select_db($db_database) ) {
				echo 'openSite <span style="color: green;">succeeded</span> in connecting to your database and has detected that your MySQL database is earlier than v4.1 and works only with the regular <strong>MySQL</strong> extension. Your settings have been updated with this change. Click below to continue.';
				$db_driver = 'MySQL';
				mysql_close();
			} else {
				$db_driver = '3';
			}
		}



		if ( $db_driver != '3' ) {
			$settings = '<?php $site = \''.$_POST['site'].'\'; $site_url = \''.$_POST['site_url'].'\'; $site_contenturl = \''.$_POST['site_contenturl'].'\'; $site_contentfolder = \''.$_POST['site_contentfolder'].'\'; $db_driver = \''.$db_driver.'\'; $db_host = \''.$db_host.'\'; $db_user = \''.$db_user.'\'; $db_pass = \''.$db_pass.'\'; $db_database = \''.$db_database.'\'; $registration = \'0\'; $guest_avatar = \'src/images/avatars/guest100x100.gif\'; $avatar_width = \'100\'; $avatar_height = \'100\'; $news_html = \'0\'; $news_comments_html = \'0\'; $news_display = \'1\'; $news_posts = \'5\'; $date_format = \'F j, Y \\a\\t g:ia\'; $skin = \'default\'; $modules_startup = \'\'; ?>';

			if ( !$handle = fopen('../src/data/settings.php', 'wb') ) {
				error('openSite was unable to open the layout data file.');
			}

			if ( fwrite($handle, $settings) === 0 ) {
				error('openSite was unable to write the layout information to the file.');
			}

			fclose($handle);
?>
  <p>
    <form method="post" action="index.php?action=step4">
      <div style="text-align: center;"><input type="submit" name="Continue" value="Continue &raquo;" class="button" style="width: 150px;" /></div>
    </form>
  </p>
<?php
		} else {
?>
  However, openSite <span style="color: red;">failed</span> to connect to the database specified on the previous page. Please click <a href="javascript:history.back()" title="Step 2">here</a> to return and correct the information provided.
<?php
		}
	} elseif ( $action == 'step4' ) {
		// STEP THREE: Database Table Creation
?>
  <strong>&raquo; Step Three: Database Table Creation</strong><br />
  Using all of the information provided on the previous pages, openSite will now attempt to create all of the necessary database tables that it needs to properly run. Click continue below to begin the process.
  <p>
    <form method="post" action="index.php?action=step5">
      <div style="text-align: center;"><input type="submit" name="Continue" value="Continue &raquo;" class="button" style="width: 150px;" /></div>
    </form>
  </p>
<?php
	} elseif ( $action == 'step5' ) {
		include('../src/data/settings.php');
		include("../src/drivers/$db_driver.php");

		$file = implode('', file('install_table.sql'));
		$db_query = explode(";", $file);
		$db_count = 0;
		$db_max = count($db_query) - 1;

		db_connect();

		while ( $db_count < $db_max ) {
			$db_execute = $db_query["$db_count"];
			db_query($db_execute) or error('openSite <span style="color: red;">failed</span> to create the necessary tables that it needs. This could be because the tables already exist in the database. Please doublecheck your settings and make any modifications that may be necessary. Click <a href="javascript:history.back()" title="Step 4">here</a> to return.');
			$db_count++;
		}

		db_close();
?>
  All of the tables that openSite needs to run have been <span style="color: green;">successfully</span> created. Click below to proceed to the next step, user account creation.
  <p>
    <form method="post" action="index.php?action=step6">
      <div style="text-align: center;"><input type="submit" name="Continue" value="Continue &raquo;" class="button" style="width: 150px;" /></div>
    </form>
  </p>
<?php
	} elseif ( $action == 'step6' ) {
		// STEP FOUR: User Account Creation
?>
  <strong>&raquo; Step Four: User Account Creation</strong><br />
  openSite has a primary root user account called 'admin' that is uneditable by other administrative accounts. It is necessary that you set the password for this vital user below to a secure password that you will remember.
  <p>
    <form method="post" action="index.php?action=step7">
      <table border="0" width="500">
      <tr><td>Password</td><td><input type="password" name="password" size="25" maxlength="20"></td></tr>
      <tr><td>Confirm Password</td><td><input type="password" name="password2" size="25" maxlength="20"></td></tr>
      <tr><td colspan="2"><input type="submit" name="Set Password" value="Set Password" class="button" style="width: 100px;"></td></tr>
      </table>
    </form>
  </p>
<?php
	} elseif ( $action == 'step7' ) {
		include('../src/data/settings.php');
		include("../src/drivers/$db_driver.php");

		if ( $_POST['password'] != '' & $_POST['password2'] != '' ) {
			if ( $_POST['password'] != $_POST['password2'] ) {
				error('The passwords did not match. Click <a href="javascript:history.back()" title="Step 6">here</a> to return.');
			}

			db_connect();

			$password = md5(db_secure($_POST['password']));

			db_query("INSERT INTO `content_users` VALUES (1, 'admin', '$password', 'admin@somewhere.com', '', 'Administrator', '', 'M', '$site', '$site_url', 0, 0, 'Admins', 'default', 3, 1);");
			db_close();
		} else {
			error('Please set a password for the \'admin\' account. Click <a href="javascript:history.back()" title="Step 6">here</a> to return.');
		}
?>
  As the admin account is primarily for super administrative tasks, it is necessary that you create a seperate administrator account in which to actually use openSite. Fill out the form below to create your user account.
  <p>
    <form method="post" action="index.php?action=step8">
      <table border="0" width="350">
      <tr><td>Username*</td><td><input type="text" name="username" size="25" maxlength="25"></td></tr>
      <tr><td>Password*</td><td><input type="password" name="password" size="25" maxlength="20"></td></tr>
      <tr><td>Confirm Password*</td><td><input type="password" name="password2" size="25" maxlength="20"></td></tr>
      <tr><td>E-mail*</td><td><input type="text" name="email" size="25" maxlength="50"></td></tr>
      <tr><td>IM</td><td><input type="text" name="im" size="25" maxlength="25"></td></tr>
      <tr><td>Title*</td><td><input type="text" name="title" size="25" maxlength="25"></td></tr>
      <tr><td>Avatar</td><td><input type="text" name="avatar" size="25" maxlength="255"></td></tr>
      <tr><td>Sex*</td><td><select name="sex"><option value="M">male</option><option value="F">female</option></select></td></tr>
      <tr><td>Site</td><td><input type="text" name="site" size="25" maxlenght="25"></td></tr>
      <tr><td>Site URL</td><td><input type="text" name="siteurl" size="25" maxlenght="150"></td></tr>
      <tr><td colspan="2"><input type="submit" name="Create" value="Create" class="button" style="width: 100px;">&nbsp;&nbsp;<input type="reset" name="Reset" value="Reset" class="button" style="width: 100px;"></td></tr>
      </table>
    </form>
    <span class="type2">Fields marked with an asterisk (*) are required.</span>
  </p>
<?php
	} elseif ( $action == 'step8' ) {
		include('../src/data/settings.php');
		include("../src/drivers/$db_driver.php");

		if ( !$_POST['username'] | !$_POST['password'] | !$_POST['password2'] | !$_POST['email'] | !$_POST['title'] ) {
			error('You did not fill in a required field. Click <a href="javascript:history.back()" title="Step 7">here</a> to return.');
		}

		if ( $_POST['password'] != $_POST['password2'] ) {
			error('The passwords do not match. Click <a href="javascript:history.back()" title="Step 7">here</a> to return.');
		}

		if ( !preg_match('/^[^@\s<&>]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $_POST['email']) ) {
			error('Invalid e-mail address. Click <a href="javascript:history.back()" title="Step 7">here</a> to return.');
		}

		db_connect();

		$username = db_secure($_POST['username']);
		$password = md5(db_secure($_POST['password']));
		$email = db_secure($_POST['email']);
		$im = db_secure($_POST['im']);
		$title = db_secure($_POST['title']);
		$avatar = db_secure($_POST['avatar']);
		$sex = db_secure($_POST['sex']);
		$site = db_secure($_POST['site']);
		$siteurl = db_secure($_POST['siteurl']);

		db_query("INSERT INTO content_users (username,password,email,im,title,avatar,sex,site,siteurl,team,rights,active) VALUES ('$username','$password','$email','$im','$title','$avatar','$sex','$site','$siteurl','Standard Users','3','1')");
		db_close();
?>
  Your new administrative user account has successfully been created. You may now login.
  <p>
    <form method="post" action="index.php?action=step9">
      <div style="text-align: center;"><input type="submit" name="Continue" value="Continue &raquo;" class="button" style="width: 150px;" /></div>
    </form>
  </p>
<?php
	} elseif ( $action == 'step9' ) {
		// STEP FIVE: Concluding Steps
		include('../src/data/settings.php');
?>
  <strong>&raquo; Step Five: Concluding Steps</strong><br />
  Congratulations! You have successfully installed openSite. You may begin using the program by going to <a href="<?php echo $site_contenturl; ?>" title="openSite"><?php echo $site_contenturl; ?></a>. Before you start using the software, however, you should remember the steps below in order to fully get your site running in optimum condition:
  <p>
    <ol>
      <li>Delete Install Directory - This will secure the application and prevent illegal changes to your site.</li>
      <li>Modify Main Site Home Page - Typically this is your index.php file. You need to change the entire file's code to the following: <span class="type2">&lt;?php include('%site_contentfolder%/src/include.php'); ?&gt;</span> where %site_contentfolder% is the relative url to your openSite directory.</li>
      <li>Setup Other User Accounts - Only one account has automatically been created thus far. You need to create additional accounts for other users if necessary.</li>
      <li>Site Layout Creation - In order for your site to work it is necessary to create a layout for your website. You can do this using the Content Center feature.</li>
      <li>News Layout Creation - Don't forget to modify the individual news post layouts too.</li>
    </ol>
  </p>
  <p>
    We apologize for the inconvenience, but openSite does not have a manual to guide you through the rest of the setup process. Please utilize the Primal Fusion forums as best as you can in order to learn the proper use of openSite. We hope that you'll enjoy using openSite and we'll be more than happy to assist you in the future. Thanks.
  </p>
  <p>
    <form method="post" action="<?php echo $site_contenturl; ?>">
      <div style="text-align: center;"><input type="submit" name="openSite" value="openSite &raquo;" class="button" style="width: 150px;" /></div>
    </form>
  </p>
<?php
	} else {
		// MAIN PAGE: Displays Welcome Message
?>
  Welcome to the world of openSite. We'd like to congratulate you on downloading one of the finest content management programs on the internet. You have currently chosen to run the installation script that came with openSite. This process will automatically carry out many of the tasks that are necessary to get openSite working with your website. It is HIGHLY recommended that you backup any of your website data before continuing. Also, DO NOT rerun this script after an installation has already been completed as it may overwrite some of your data and will not finish entirely. Finally, at the end remember to delete the 'install' folder found in the installation package in order to prevent other people from damaging your openSite experience. Thanks and enjoy using openSite!
  <p>
    <strong>&raquo; Installation Process</strong>
    <ol>
      <li>File Structure Integrity Check</li>
      <li>Settings Modification</li>
      <li>Database Table Creation</li>
      <li>User Account Creation</li>
      <li>Concluding Steps</li>
    </ol>
  </p>
  <p>
    <form method="post" action="index.php?action=step1">
      <div style="text-align: center;"><input type="submit" name="Begin Installation" value="Begin Installation &raquo;" class="button" style="width: 150px;" /></div>
    </form>
  </p>
<?php
	}

	include('default/footer.php');
?>