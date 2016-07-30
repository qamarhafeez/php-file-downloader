<?php
/*echo "starting http://www.tablecriticboston.com/wptwin-The_TableCritic-2013-01-25-222554.wpt";

if(!copy("http://www.tablecriticboston.com/wptwin-The_TableCritic-2013-01-25-222554.wpt", "wptwin-The_TableCritic-2013-01-25-222554.wpt"))
{
echo("failed to copy file");
}
echo "Finish";*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP File Downloader</title>
<style type="text/css">
/* === Remove input autofocus webkit === */
*:focus {outline: none;}

/* === Form Typography === */
body {font: 14px/21px "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif;}
.download_form h2, .download_form label {font-family:Georgia, Times, "Times New Roman", serif;}
.form_hint, .required_notification {font-size: 11px;}

/* === List Styles === */
.download_form ul {
    width:750px;
    list-style-type:none;
	list-style-position:outside;
	margin:0px;
	padding:0px;
}
.download_form li{
	padding:12px; 
	border-bottom:1px solid #eee;
	position:relative;
} 
.download_form li:first-child, .download_form li:last-child {
	border-bottom:1px solid #777;
}

/* === Form Header === */
.download_form h2 {
	margin:0;
	display: inline;
}
.required_notification {
	color:#d45252; 
	margin:5px 0 0 0; 
	display:inline;
	float:right;
}

/* === Form Elements === */
.download_form label {
	width:150px;
	margin-top: 3px;
	display:inline-block;
	float:left;
	padding:3px;
}
.download_form input {
	height:20px; 
	width:220px; 
	padding:5px 8px;
}
.download_form button {margin-left:156px;}

	/* form element visual styles */
	.download_form input{ 
		border:1px solid #aaa;
		box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
		border-radius:2px;
		padding-right:30px;
		-moz-transition: padding .25s; 
		-webkit-transition: padding .25s; 
		-o-transition: padding .25s;
		transition: padding .25s;
	}
	.download_form input:focus {
		background: #fff; 
		border:1px solid #555; 
		box-shadow: 0 0 3px #aaa; 
		padding-right:70px;
	}

/* === HTML5 validation styles === */	
.download_form input:required {
	background: #fff url(images/red_asterisk.png) no-repeat 98% center;
}
.download_form input:required:valid {
	background: #fff url(images/valid.png) no-repeat 98% center;
	box-shadow: 0 0 5px #5cd053;
	border-color: #28921f;
}
.download_form input:focus:invalid {
	background: #fff url(images/invalid.png) no-repeat 98% center;
	box-shadow: 0 0 5px #d45252;
	border-color: #b03535
}

/* === Form hints === */
.form_hint {
	background: #d45252;
	border-radius: 3px 3px 3px 3px;
	color: white;
	margin-left:8px;
	padding: 1px 6px;
	z-index: 999; /* hints stay above all other elements */
	position: absolute; /* allows proper formatting if hint is two lines */
	display: none;
}
.form_hint::before {
	content: "\25C0";
	color:#d45252;
	position: absolute;
	top:1px;
	left:-6px;
}
.download_form input:focus + .form_hint {display: inline;}
.download_form input:required:valid + .form_hint {background: #28921f;}
.download_form input:required:valid + .form_hint::before {color:#28921f;}
	
/* === Button Style === */
button.submit {
	background-color: #68b12f;
	background: -webkit-gradient(linear, left top, left bottom, from(#68b12f), to(#50911e));
	background: -webkit-linear-gradient(top, #68b12f, #50911e);
	background: -moz-linear-gradient(top, #68b12f, #50911e);
	background: -ms-linear-gradient(top, #68b12f, #50911e);
	background: -o-linear-gradient(top, #68b12f, #50911e);
	background: linear-gradient(top, #68b12f, #50911e);
	border: 1px solid #509111;
	border-bottom: 1px solid #5b992b;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-ms-border-radius: 3px;
	-o-border-radius: 3px;
	box-shadow: inset 0 1px 0 0 #9fd574;
	-webkit-box-shadow: 0 1px 0 0 #9fd574 inset ;
	-moz-box-shadow: 0 1px 0 0 #9fd574 inset;
	-ms-box-shadow: 0 1px 0 0 #9fd574 inset;
	-o-box-shadow: 0 1px 0 0 #9fd574 inset;
	color: white;
	font-weight: bold;
	padding: 6px 20px;
	text-align: center;
	text-shadow: 0 -1px 0 #396715;
}
button.submit:hover {
	opacity:.85;
	cursor: pointer; 
}
button.submit:active {
	border: 1px solid #20911e;
	box-shadow: 0 0 10px 5px #356b0b inset; 
	-webkit-box-shadow:0 0 10px 5px #356b0b inset ;
	-moz-box-shadow: 0 0 10px 5px #356b0b inset;
	-ms-box-shadow: 0 0 10px 5px #356b0b inset;
	-o-box-shadow: 0 0 10px 5px #356b0b inset;
	
}
</style>
</head>

<body>
	<?php
		if((!empty($_POST['action'])) && ($_POST['action']=="download")):
			
			error_reporting(E_ALL ^ E_NOTICE);
			ini_set( 'max_execution_time',300 );
			ini_set("memory_limit","100M");
			echo "starting " . $_POST['filedownload'] . "<br />";
			if(file_exists($_POST['filesave'])):
				unlink($_POST['filesave']);
			endif;
			if(!copy($_POST['filedownload'], $_POST['filesave'])):
				echo("failed to copy file");
			else:
				echo "Copy Completed Successfully<br />";
				echo 'MD5 ' . md5_file($_POST['filesave']) . "<br />";
			endif;
		else:
	?>
	<form class="download_form" method="post" action="#" name="download_form">
    	<input type="hidden" name="action" value="download" />
		<ul>
			<li>
				<h2>Download Form</h2>
				<span class="required_notification">* Denotes Required Field</span>
			</li>

			<li>
				<label for="File to download">File to download</label>
				<input type="text" name="filedownload" placeholder="File Name Here" required/><br />
			</li>
			<li>
				<label for="File to Save">File to Save</label>
				<input type="text" name="filesave" placeholder="Save File Name Here" required/><br />
			</li>
			<li>
        	<button class="submit" type="submit">Download</button>
        </li>
		</ul>        
    </form>
   <?php endif; ?>
</body>
</html>
