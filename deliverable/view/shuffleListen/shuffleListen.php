<?php
	require_once('../ViewHelper.php');
?>
<html>
    <head>
        <?php
			VH::instance()->simpleCharSet();
		?>
		<title>Shuffle Listen</title>
		<link rel='stylesheet' media='screen' type='text/css' href='../css/base.css'/>
    </head>
	<body>
        <!-- header -->
		<?php
			VH::instance()->showMainNav();
		?>
		<!-- wrapper-->    
		<div id="wrapper">
			<!-- sub-navigation -->
            <?php
                VH::instance()->showShuffleListenNav();
            ?>
			<!-- content -->
			<div id="content">
				<div class='article'>
					<div class="article_img_div">
						<img src='../image/shuffleLesson/listen_article.jpg'>
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
					<img src='../image/shuffleLesson/listen_aside.jpg'>
				</div>
			</div>
			<?php
				VH::instance()->showFooter();
			?>
		</div>
	
	</body>
</html>
