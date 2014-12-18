<?xml version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transistional//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>{title}</title>
  <link rel="copyright" href="http://www.primalfusion.net" />
  <link rel="stylesheet" type="text/css" href="src/layout/skins/default/style.css" />
  <meta name="description" content="{title}" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
  <meta http-equiv="pragma" content="no-cache" />
</head>
<body>
  <table class="main_table" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td class="top_nav">
    </td>
    <td class="top_header">
      <img src="src/layout/skins/default/images/top_header.gif" border="0" alt="Primal Fusion" title="Primal Fusion" width="250" height="30" />
    </td>
  </tr>
  <tr>
    <td class="top_banner" colspan="2">
      <img src="src/layout/skins/default/images/banner.png" class="banner" name="banner" width="750" height="100" alt="Primal Fusion - The ultimate fusion of primal urge" title="Primal Fusion - The ultimate fusion of primal urge" />
    </td>
  </tr>
  <tr>
    <td class="top_sub" colspan="2">
      &nbsp;&nbsp;&nbsp;<strong>Welcome</strong> » Please login below - {title}
    </td>
  </tr>
  <tr>
    <td colspan="2" class="main_content">
      <br /><br /><br />
      {form_start}
        <table class="login_table" cellpadding="5" cellspacing="0" width="400" align="center">
        <tr>
          <td>
            <strong>&nbsp;username</strong>
          </td>
          <td class="login_box">
            &nbsp;<input type="text" name="username" class="login_textbox" maxlength="50" />
          </td>
        </tr>
        <tr>
          <td>
            <strong>&nbsp;password</strong>
          </td>
          <td class="login_box">
            &nbsp;<input type="password" name="password" class="login_textbox" maxlength="20" />
          </td>
        </tr>
        <tr valign="middle" class="login"> 
          <td colspan="3" height="25">
            <div align="center">
              <input type="submit" name="Login" value="Login" class="button_login" />
              <input type="reset" name="Clear" value="Clear" class="button_login" />
            </div>
          </td>
        </tr>
        <tr valign="middle" class="login">
          <td colspan="2" height="15" align="center">
            {message}
          </td>
        </tr>
        </table>
      {form_end}
    </td>
  </tr>
  <tr>
    <td class="bottom_copy" colspan="2">
      <img src="src/layout/skins/default/images/copyright.gif" name="copy" alt="Primal Fusion © 2001-2005 Ryan Strug. All Rights Reserved." />
    </td>
  </tr>
  </table>
</body>
</html>