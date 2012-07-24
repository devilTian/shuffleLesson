<?php
	require_once('../db/book.php');
?>
<html>
    <head>
		<title></title>
		<style>
			body {
				font-size:14px;
				margin:0px;
				padding:0px;
			}
			body a {
				text-decoration:none;
				cursor:pointer;
			}
			h2 {
			    color: #006600;
			    font: 14px/150% Arial,Helvetica,sans-serif;
			    margin: 0 0 12px;
			}
			ul {
				list-style-type:none;
			}
			.float_left {
				float:left;
			}
			.float_right {
				float:right
			}
			.clearfix {
				clear:both;
			}

			#top_nav {
				border-bottom:1px dashed #DDDDDD;
			}
			.main_nav {
				float:left;
				margin:10px 20px 10px 20px;
 			}
			.log_nav {
				float:right; 
				margin:10px 20px 10px 20px;
			}
			.main_nav a,.log_nav a {
				font-size:12px;
				color:#566D5E;
			}
			.main_nav a:active {
				font-weight:800;
			}
			.main_nav a:hover,.log_nav a:hover {
				color:#FFFFFF;
				background-color:#219A44;
			}

			.headline {
				font:normal bold 30px arial,sans-serif;
				color:green;
			}

			.listen_nav {
				display:inline;
				padding:0 8 0 8;
				border-left:1px dotted #DDDDDD;
			}
			.listen_nav a {
				color:#0C7823;
			}
			.listen_nav a:hover {
				color:#FFFFFF;
				background-color:#0C7826;
			}

			#wrapper {
				margin: 15px auto;
				width: 950px;
			}

			.article {
				float:left;
				padding-right:40px;
				width:590px;
			}
			.article_img_div {
				margin-bottom:2em;
			}
			.aside {
				float:right;
				width:310px;
			}
		
			#footer {
				border-top: 1px dashed #DDDDDD;
			    color: #999999;
			    margin-top: 40px;
  				overflow: hidden;
    			padding-top: 6px;
			}

			.pl {
				color:#666666;
				font:12px/150% Arial,Helvetica,sans-serif;
			}
			.pl a {
				color:#336699;
			}
			.pl a:hover {
				color:#FFFFFF;
				background-color:#003399;
			}
		</style>
    </head>
	<body>
        <!-- header -->
	    <!-- navigation -->
	    <div id="top_nav">
			<div class='main_nav'>
				<a href='#'>ShuffleListen</a>
				&nbsp;&nbsp;
				<a href='#'>ShuffleWatch</a>
				&nbsp;&nbsp;
				<a href='#'>ShuffleSport</a>
				&nbsp;&nbsp;
			</div>
			<div class="log_nav">
				<a href='#'>Mail</a>
				&nbsp;&nbsp;
				<a href='#'>Account</a>
				&nbsp;&nbsp;
				<a href='#'>LogIn/LogOut</a>
				&nbsp;&nbsp;
			</div>
			<br style="clear: both"/>
		</div>

		<!-- wrapper-->    
		<div id="wrapper">
			<!-- sub-navigation -->
			<div class="float_left" style="margin-top:5px">
				<label class='headline'>ShuffleListen</label>
			</div>
			<div class="float_left" style="margin:10px 0px 0 28px;">
				<input style="color:#D4D4D4" value='book, author, isbn'/>
				<button style="width:58px">Search</button>
			</div>
			<div class="float_left">
				<ul>
					<li class='listen_nav'><a href='#'>iListen</a></li>
					<li class='listen_nav'><a href='#'>Dynamic</a></li>
					<li class='listen_nav'><a href='#'>Guess</a></li>
					<li class='listen_nav'><a href='#'>Resources</a></li>
					<li class='listen_nav'><a href='#'>Hear</a></li>
					<li class='listen_nav'><a href='#'>Cart</a></li>
				</ul>
			</div>
			<br style="clear:both;margin-bottom:40px"/>
			
			<!-- content -->
			<div id="content">
				<div class='article'>
					<div class="article_img_div">
						<img src='image/listen_article.jpg'>
					</div>
					<div class="res_express clearfix">
						<h2>
							Lasted Resources&nbsp;. . . . . .&nbsp;
							<span class="pl">
								(&nbsp;<a href='#'>More</a>&nbsp;)
							</span>
						</h2>
					</div>
					<div id='glide1'>
						<ul style="padding:0px">
					<?php
						$book = new Book();
						$books = $book->getAllBooks();
						
						foreach( $books as $book ) {
							echo "<li style='float:left;width:106px;margin-right:15px'><img src='image/book{$book['id']}_normal.jpg'/></li>";
						}
					?>
						</ul>
					</div>
				</div>
				<div class='aside'>
					<img src='image/listen_aside.jpg'>
				</div>
			</div>
			<br style="clear:both"/>
	    	
			<!-- footer-->
	    	<div id="footer">
				<span id="icp" class="float_left gray-link"> &copy; 2005 - 2012 devilTian.com, all rights reserved </span>
			</div>
		</div>
	
	</body>
</html>
