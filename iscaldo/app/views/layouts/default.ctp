<?php 
$routeApp=$this->webroot;
?>	
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<script> 
        	routeApp = "<?php echo $routeApp ?>";        	
        	baseUrl = location.protocol + "//" + location.hostname + (location.port && ":" + location.port) + "" + routeApp;        	
        </script>
	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
				
		<title><?php echo $title_for_layout ?></title>

		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->webroot?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot?>css/media-queries.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot?>js/player/mediaelementplayer.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,700,700italic|Open+Sans+Condensed:300,700' rel="stylesheet" type='text/css'>
		
		<!--[if IE 8]>		
		<link rel="stylesheet" type="text/css" href="css/ie8.css" media="all" />
		<![endif]-->
		<!--[if IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie9.css" media="all" />
		<![endif]-->
		
		<script type="text/javascript" src="<?php echo $this->webroot?>js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->webroot?>js/ddsmoothmenu.js"></script>
		<script type="text/javascript" src="<?php echo $this->webroot?>js/retina.js"></script>
		<script type="text/javascript" src="<?php echo $this->webroot?>js/selectnav.js"></script>
		<script type="text/javascript" src="<?php echo $this->webroot?>js/jquery.masonry.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->webroot?>js/jquery.fitvids.js"></script>
		<script type="text/javascript" src="<?php echo $this->webroot?>js/jquery.backstretch.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->webroot?>js/mediaelement.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->webroot?>js/mediaelementplayer.min.js"></script>
		<script type="text/javascript" src="<?php echo $this->webroot?>js/jquery.dcflickr.1.0.js"></script>		
		
		<script type="text/javascript">
			$.backstretch("<?php echo $this->webroot?>img/bg/1.jpg");
		</script>
		
	</head>
<body>
<div class="scanlines"></div>

<!-- Begin Header -->
<div class="header-wrapper opacity">
	<div class="header">
		<!-- Begin Logo -->
		<div class="logo">
		    <a href="index.html">
				<img src="<?php echo $this->webroot?>img/logo.png" alt="" />
			</a>
	    </div>
		<!-- End Logo -->
		<!-- Begin Menu -->
		<div id="menu-wrapper">
			<div id="menu" class="menu">
				<ul id="tiny">
					<li class="active"><a href="index.html">Blog</a>
						<ul>
							<li><a href="post.html">Blog Post</a></li>
						</ul>
					</li>
					<li><a href="page-with-sidebar.html">Pages</a>
						<ul>
							<li><a href="page-with-sidebar.html">Page With Sidebar</a></li>
							<li><a href="full-width.html">Full Width</a></li>
						</ul>
					</li>
					<li><a href="typography.html">Styles</a>
						<ul>
							<li><a href="typography.html">Typography</a></li>
							<li><a href="columns.html">Columns</a></li>
						</ul>
					</li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
		<!-- End Menu -->
	</div>
</div>
<!-- End Header -->

<!-- Begin Wrapper -->
<div class="wrapper"><!-- Begin Intro -->
<div class="intro">Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus augue laoreet rutrum faucibus dolor auctor. Cras mattis consectetur purus sit amet fermentum, Vestibulum id ligula porta. </div>
<ul class="social">
<li><a class="rss" href="#"></a></li><li><a class="facebook" href="#"></a></li><li><a class="twitter" href="#"></a></li><li><a class="pinterest" href="#"></a></li><li><a class="dribbble" href="#"></a></li><li><a class="flickr" href="#"></a></li><li><a class="linkedin" href="#"></a></li></ul><!-- End Intro --> 

<?php echo $content_for_layout ?>

</div>
<!-- End Wrapper -->

<!-- Begin Footer -->
<div class="footer-wrapper">
<div id="footer" class="four">
		<div id="first" class="widget-area">
			<div class="widget widget_search">
				<h3 class="widget-title">Search</h3>
				<form class="searchform" method="get" action="#">
					<input type="text" name="s" value="type and hit enter" onFocus="this.value=''" onBlur="this.value='type and hit enter'"/>
				</form>
			</div>
			<div class="widget widget_archive">
				<h3 class="widget-title">Archives</h3>
				<ul>
					<li><a href="#">September 2012</a> (6)</li>
					<li><a href="#">August 2012</a> (2)</li>
					<li><a href="#">July 2012</a> (2)</li>
					<li><a href="#">June 2012</a> (4)</li>
					<li><a href="#">May 2012</a> (3)</li>
					<li><a href="#">January 2012</a> (1)</li>
				</ul>
			</div>	
		</div><!-- #first .widget-area -->
	
		<div id="second" class="widget-area">
			<div id="twitter-2" class="widget widget_twitter">
					<h3 class="widget-title">Twitter</h3>
					
					<div id="twitter-wrapper">
						<div id="twitter"></div>
						<span class="username"><a href="http://twitter.com/elemisdesign">→ Follow @elemisdesign</a></span>
					</div>
			</div>
		</div><!-- #second .widget-area -->
	
		<div id="third" class="widget-area">
		<div id="example-widget-3" class="widget example">
			<h3 class="widget-title">Popular Posts</h3>
			<ul class="post-list">
			  	<li> 
			  		<div class="frame">
			  			<a href="#"><img src="<?php echo $this->webroot?>img/art/s1.jpg" /></a>
			  		</div>
					<div class="meta">
					    <h6><a href="#">Charming Winter</a></h6>
					    <em>28th Sep 2012</em>
				    </div>
				</li>
				<li> 
			  		<div class="frame">
			  			<a href="#"><img src="<?php echo $this->webroot?>img/art/s2.jpg" /></a>
			  		</div>
					<div class="meta">
					    <h6><a href="#">Trickling Stream</a></h6>
					    <em>5th Sep 2012</em>
				    </div>
				</li>
				<li> 
			  		<div class="frame">
			  			<a href="#"><img src="<?php echo $this->webroot?>img/art/s3.jpg" /></a>
			  		</div>
					<div class="meta">
					    <h6><a href="#">Morning Glory</a></h6>
					    <em>26th Sep 2012</em>
				    </div>
				</li>
			</ul>
			
		</div>
		</div><!-- #third .widget-area -->
		
		<div id="fourth" class="widget-area">
		<div class="widget">
			<h3 class="widget-title">Flickr</h3>
			<ul class="flickr-feed"></ul>
			
		</div>
		</div><!-- #fourth .widget-area -->
	</div>
</div>
<div class="site-generator-wrapper">
	<div class="site-generator">Copyright Obscura 2012. Design by <a href="http://elemisfreebies.com">elemis</a>. All rights reserved.</div>
</div>
<!-- End Footer --> 
<script type="text/javascript" src="<?php echo $this->webroot?>js/scripts.js"></script>
</body>
</html>	
	
	