<?php
	// displays a menu to select which type of news layout to modify

	if ( $_COOKIE['rights'] == 2 ) {
		error('Moderators do not have the rights needed to modify news layouts.');
	}

	if ( $id == 2 ) {
		$layout = $_POST['layout'];

		if ( $_POST['type'] == 'news' ) {
?>
  <meta http-equiv=refresh content="0; url=<?php echo $site_contenturl; ?>/index.php?action=news&amp;news=layout_news&amp;layout=<?php echo $layout; ?>">
<?php
		} else {
?>
  <meta http-equiv=refresh content="0; url=<?php echo $site_contenturl; ?>/index.php?action=news&amp;news=layout_day&amp;layout=<?php echo $layout; ?>">
<?php
		}

		exit;
	}
?>
  <strong><img src="src/images/icons/news.gif" alt="&nbsp;" title="News" /> News Layouts</strong><br />
  <form method="post" action="index.php?action=news&amp;news=layout&amp;id=2">
    <table border="0" width="400">
    <tr><td width="100">select layout</td><td>
<?php
	if ( $handle = opendir('src/data/layouts/') ) {
		$test = false;

		while (false !== ($file = readdir($handle))) {
			if ( $file != '.' & $file != '..' & $file != 'stylesheets' & $file != 'index.html' & $file != '.htaccess' ) {
				if ( $test == false ) {
					echo '<select name="layout">';
				}

				$file = basename($file, '.php');
				echo "<option value=\"$file\">$file</option>";
				$test = true;
			}
		}

		closedir($handle);
	}

	if ( $test == true ) {
		echo '</select></td></tr><tr><td>news layout type</td><td><select name="type">';

		if ( $news_display == 2 ) {
			echo '<option value="news_day">Day Based News</option><option value="news">Standard News</option>';
		} else {
			echo '<option value="news">Standard News</option><option value="news_day">Day Based News</option>';
		}

		echo '</select></td></tr>';
	} else {
		echo '<span class="type2">No layouts could be found</span>';
	}
?>
    </td></tr>
<?php
	if ( $test == true ) {
?>
    <tr><td colspan="2"><input type="submit" name="Modify Layout" value="Modify Layout" class="button" style="width: 100px;"></td></tr>
<?php
	}
?>
    </table>
  </form>