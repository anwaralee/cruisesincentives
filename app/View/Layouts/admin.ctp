<!DOCTYPE HTML>

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
		
        <script>
        $(function(){
           $('#flashMessage').fadeOut(3000,'linear'); 
           
           var h1 = $('.sidebar').height(); 
           var h2 = $('.contentRight').height();
           //var h3 = $('.CKEDITOR').height();
            //h2 = Number(h3)+Number(h2)
           //alert(h2);
           var h =0;
           if(h1>h2)
            h = h1;
           else
            h = h2;
            //alert(h);
           $('.sidebar').css('height',h);
           $('.sidebar').css('background','#eee');
        });
        </script>
		
	</head>
	<body>
    <div class="wrapper">
    <div class="header">
        <div class="logo"></div>
        
        <div class="clear"></div>
        <ul>

            <li <?php if($this->params['action']=='editPage')echo "class='active'";?>><a href="<?php echo $this->webroot;?>admin/editPage/2">Pages</a></li>
            <li <?php if($this->params['action']=='destinations')echo "class='active'";?>><a href="<?php echo $this->webroot;?>admin/destinations/1">Destinations</a></li>
            <li <?php if($this->params['action']=='page')echo "class='active'";?>><a href="<?php echo $this->webroot;?>dashboard/settings">Settings</a></li>
            <li <?php if($this->params['action']=='banners')echo "class='active'";?>><a href="<?php echo $this->webroot;?>admin/banners">Banners</a></li>
            <li <?php if($this->params['action']=='cruiseline')echo "class='active'";?>><a href="<?php echo $this->webroot;?>admin/cruiseline">Cruiseline</a></li>
            <li <?php if($this->params['action']=='resources'|| $this->params['action']=='resource_pdf')echo "class='active'";?>><a href="<?php echo $this->webroot;?>admin/resources">Resource Center</a></li>
            <li <?php if($this->params['action']=='news')echo "class='active'";?>><a href="<?php echo $this->webroot;?>admin/news">News</a></li>
            <li <?php if($this->params['action']=='csi')echo "class='active'";?>><a href="<?php echo $this->webroot;?>admin/csi">CSI</a></li>
            <li <?php if($this->params['action']=='newsletters')echo "class='active'";?>><a href="<?php echo $this->webroot;?>admin/newsletters">Newsletter</a></li>
            <li ><a href="<?php echo $this->webroot;?>admin/logout">Logout</a></li>

            
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
