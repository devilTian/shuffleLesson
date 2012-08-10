<?php
	require_once('../ViewHelper.php');
?>
<html>
    <head>
        <?php
			VH::instance()->simpleCharSet();
            $bookData = VH::instance()->getSpecifiedBook($_GET['id']);
		?>
		<title><?php echo $bookData['name']; ?>&nbsp;(Shuffle Listen)</title>
		<link rel='stylesheet' media='screen' type='text/css' href='../css/base.css'/>
		<script type='text/javascript' src='../js/shuffleListen.js'></script>
        <script>
            var myReq = getXMLHTTPRequest();
        </script>
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
                <h1>
                    <span><?php echo $bookData['name']; ?></span>
                </h1>
				<div class='article'>
                    <?php
                        VH::instance()->showSpecBookInfo($bookData);
                    ?>
				</div>
				<div class='aside'>
                    <?php 
                        VH::instance()->showCreateBookBtn();
                        VH::instance()->showListenBookCategory();
                    ?>
				</div>
			</div>
			<?php
				VH::instance()->showFooter();
			?>
		</div>
	
	</body>
</html>
