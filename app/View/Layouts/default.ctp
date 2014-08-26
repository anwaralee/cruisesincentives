<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Islami Sangh Nepal</title>
<script src="<?php echo $this->webroot;?>js/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Anwar Ali - Web-Nepal" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="<?php echo $this->webroot;?>css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800italic,800' rel='stylesheet' type='text/css'>

<!-- Beginning of compulsory code below -->

<link href="<?php echo $this->webroot;?>css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->webroot;?>css/dropdown/themes/nvidia.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />

<!-- / END -->

</head>
<body class="nvidia-com">
<div class="header">
<h1 class="left"><div class="logo"><img src="<?php echo $this->webroot;?>images/logo.png" alt="Logo" width="100" /></div><div class="company"><img src="<?php echo $this->webroot;?>images/company.png"/></div><div class="clear"></div></h1>

<!-- Beginning of compulsory code below -->

<ul class="dropdown dropdown-horizontal right">
	<li><a href="<?php echo $this->webroot;?>">Home</a></li>
	<li>
        <a href="" class="dir" onclick="return false;">About Us</a>
        <ul>
			<li><a href="<?php echo $this->webroot;?>view/history">History</a></li>
			<li><a href="<?php echo $this->webroot;?>view/ideology">Ideology</a></li>
			<li><a href="<?php echo $this->webroot;?>view/mission">Mission</a></li>
			<li><a href="<?php echo $this->webroot;?>view/constitution">Constitution</a></li>
			<li><a href="<?php echo $this->webroot;?>view/structure">Organizational Structure</a></li>
			<li><a href="<?php echo $this->webroot;?>view/zonal-headquarters">Zonal Headquarters</a></li>
			<li><a href="<?php echo $this->webroot;?>view/policy">Policy Program</a></li>
			
		</ul>
    </li>
	<li><a href="./" class="dir" onclick="return false;">Departments</a>
		<ul>
			<?php 
            $q = $this->requestAction('/pages/getpages/3');
            foreach($q as $d)
            {
                ?>
                <li><a href="<?php echo $this->webroot;?>view/<?php echo $d['Page']['slug'];?>"><?php echo $d['Page']['title'];?></a></li>
                <?php
            }
            ?>
            
		</ul>
	</li>
	<li><a href="./" class="dir" onclick="return false;">Activities</a>
		<ul>
			<?php 
            $q = $this->requestAction('/pages/getpages/4');
            foreach($q as $d)
            {
                ?>
                <li><a href="<?php echo $this->webroot;?>view/<?php echo $d['Page']['slug'];?>"><?php echo $d['Page']['title'];?></a></li>
                <?php
            }
            ?>
		</ul>
	</li>
    <li><a href="./" class="dir" onclick="return false;">Media</a>
        <ul>
			<li><a href="<?php echo $this->webroot;?>media/Print">Print</a></li>
			<li><a href="<?php echo $this->webroot;?>media/Publication">Publication</a></li>
			<li><a href="<?php echo $this->webroot;?>media/Audio-Visual">Audio-Visual</a></li>
		</ul>
	</li>
	<li><a href="<?php echo $this->webroot;?>contact">Contact Us</a></li>
	
</ul>
<div class="clear"></div>
</div>
<div class="content">
    <div class="main left">
    <?php echo $this->fetch('content'); ?>
    </div>
    <div class="sidebar right">
        <h1 class="title"><span>Share us</span></h1>
        <!-- AddThis Button BEGIN -->
        <ul>
            <li>
                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                <a class="addthis_button_preferred_1"></a>
                <a class="addthis_button_preferred_2"></a>
                <a class="addthis_button_preferred_3"></a>
                <a class="addthis_button_preferred_4"></a>
                <a class="addthis_button_compact"></a>
                <a class="addthis_counter addthis_bubble_style"></a>
                </div>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53551fdf0354dd89"></script>

            </li>
        </ul>
        <p>&nbsp;</p>
        <h1 class="title"><span>Quick links</span></h1>
        <ul>
            <?php $links = $this->requestAction('/pages/getLinks');?>
            <?php
            foreach($links as $l)
            {
                ?>
                <li><a href="<?php echo $l['Link']['links'];?>" target="_blank"><?php echo $l['Link']['title'];?></a></li>
                <?php
            }
            ?>
            
            
        </ul>
        <p>&nbsp;</p>
        <h1 class="title"><span>Departments</span></h1>
        <ul>
            <?php $links = $this->requestAction('/pages/getPages/3');?>
            <?php
            foreach($links as $l)
            {
                ?>
                <li><a href="<?php echo $this->webroot?>view/<?php echo $l['Page']['slug'];?>"><?php echo $l['Page']['title'];?></a></li>
                <?php
            }
            ?>
        </ul>
        
        

    </div>
    <div class="clear"></div>
    
</div>
<div class="footer">
        <center>&copy; Copyright 2014 Islami Sangh Nepal.<br />Powered By <a href="http://web-nepal.com/">Web-Nepal</a></center>
    </div>
<!-- / END -->

</body>
</html>