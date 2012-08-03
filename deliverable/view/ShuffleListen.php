<?php
	require_once('ViewHelper.php');
?>
<html>
    <head>
		<title></title>
		<link rel='stylesheet' media='screen' type='text/css' href='css/base.css'/>
    </head>
	<body>
        <!-- header -->
		<?php require_once('mainNav.html'); ?>
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
							VH::instance()->showAllBooks()
						?>
						</ul>
					</div>
				</div>
				<div class='aside'>
					<img src='image/listen_aside.jpg'>
				</div>
			</div>
			<br style="clear:both"/>
	    	<?php include_once('footer.html');?>
		</div>
	
	</body>
</html>
