<!DOCTYPE HTML>
<!--
	Tessellate 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Cruises Incentives</title>
			<link href="<?php echo $this->webroot;?>css/admin.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo $this->webroot;?>css/bootstrap.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo $this->webroot;?>css/jquery.Jcrop.css" rel="stylesheet" type="text/css" />
            <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
            <script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.js" type="text/javascript"></script>
            <script type="text/javascript" src="<?php echo $this->webroot;?>js/ajaxupload.3.6.js"></script>
            <script type="text/javascript" src="<?php echo $this->webroot;?>js/ckeditor/ckeditor.js"></script>
            <script type="text/javascript" src="<?php echo $this->webroot;?>js/ckfinder/ckfinder.js"></script>
            <script type="text/javascript" src="<?php echo $this->webroot;?>js/jquery.Jcrop.js"></script>
            <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
		
		
	</head>
	<body>
    <div class="wrapper">
    <div class="header">
        <div class="logo"></div>
        
        <div class="clear"></div>
        <ul>
            <li><a href="<?php echo $this->webroot;?>admin/pages">Pages</a></li>
            <li><a href="<?php echo $this->webroot;?>admin/destinations">Destinations</a></li>
            <li><a href="<?php echo $this->webroot;?>dashboard/settings">Settings</a></li>
            <li><a href="<?php echo $this->webroot;?>admin/banners">Banners</a></li>
            <li><a href="<?php echo $this->webroot;?>admin/cruiseline">Cruiseline</a></li>
            <li><a href="<?php echo $this->webroot;?>admin/resources">Resource Center</a></li>
            <li><a href="<?php echo $this->webroot;?>admin/news">News</a></li>
            <li><a href="<?php echo $this->webroot;?>admin/news">CSI</a></li>
            <li><a href="<?php echo $this->webroot;?>admin/newsletters">Newsletter</a></li>
            <li><a href="<?php echo $this->webroot;?>admin/logout">Logout</a></li>
            
        </ul>
    </div>
    <div class="content">
    <?php echo $this->Session->flash();?>
    <?php echo $this->fetch('content'); ?>
    </div>
    <div class="footer">
        <hr />
        &copy; Copyright 2014. <a href="<?php echo $this->webroot;?>/">CSI</a>
    </div>
    </div>
    </body>
</html>

<?php echo $this->element('sql_dump'); ?>
