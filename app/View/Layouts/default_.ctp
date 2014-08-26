<!DOCTYPE HTML>
<!--
	Tessellate 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Islami Sangh Nepal</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="<?php echo $this->webroot;?>js/jquery.min.js"></script>
		<script src="<?php echo $this->webroot;?>js/skel.min.js"></script>
		<script src="<?php echo $this->webroot;?>js/init.js"></script>
         <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		<noscript>
			<link rel="stylesheet" href="<?php echo $this->webroot;?>css/skel-noscript.css" />
			<link rel="stylesheet" href="<?php echo $this->webroot;?>css/style.css" />
			<link rel="stylesheet" href="<?php echo $this->webroot;?>css/style-wide.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
            <section id="header1">
                <header class="loading" style="opacity: 1;">
                    <h1 id="logo">
                    <a href="#">ISLAMI SANGH NEPAL</a>
                    </h1>
                    <nav id="nav">
                    <ul>
                    <li>
                    <a href="#header" class="scrolly">Home</a>
                    </li>
                    <li>
                    <a href="#first" class="scrolly">About Us</a>
                    </li>
                    <li>
                    <a href="#second" class="scrolly">Departments</a>
                    </li>
                    <li>
                    <a href="#third" class="scrolly">Activities</a>
                    </li>
                    <li>
                    <a href="#fourth" class="scrolly">Media</a>
                    </li>
                    <li>
                    <a href="#fifth" class="scrolly">Contact</a>
                    </li>
                    </ul>
                    </nav>
                </header>
            </section>

			<?php echo $this->fetch('content'); ?>

	<?php //echo $this->element('sql_dump'); ?>
    <section id="footer">
				<ul class="icons">
					<li><a href="#" class="fa fa-twitter solo"><span>Twitter</span></a></li>
					<li><a href="#" class="fa fa-facebook solo"><span>Facebook</span></a></li>
					<li><a href="#" class="fa fa-google-plus solo"><span>Google+</span></a></li>
					<li><a href="#" class="fa fa-dribbble solo"><span>Dribbble</span></a></li>
					<li><a href="#" class="fa fa-github solo"><span>GitHub</span></a></li>
				</ul>
				<div class="copyright">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li>
						<li>Design: <a href="http://html5up.net/">HTML5 UP</a></li>
					</ul>
				</div>
			</section>

	</body>
</html>
