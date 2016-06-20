<html>
<head>
	<link rel="shortcut icon" href="bitbug_favicon.ico" type="image/x-icon">
	<link rel="icon" href="bitbug_favicon.ico" type="image/x-icon">
	<title>欢迎来到我的网站！</title>
</head>
<?php 
	require "time.php";
?>
<body onload="startTime()">
当前时间:<a id="txt"></a>
<?php
	echo "<br/>";
	echo "&nbsp;";
	require "lunarcalendar.php";
	require "calendar.php";
?>
</body>
</html>