<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>後台管理</title>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="67"><?php if(!empty($_SESSION['myid'])){?>使用者:<?php }?></td>
    <td width="237"><?php if(!empty($_SESSION['myid'])){ echo $_SESSION['myid']; }?></td>
    <td width="424" align="center"></td>
    <td width="72" align="center"><?php if(!empty($_SESSION['myid'])){?><a href="out.php">登出</a><?php }?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
