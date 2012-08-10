<?php
	require_once('../ViewHelper.php');
?>
<html>
    <head>
        <?php
			VH::instance()->simpleCharSet();
		?>
		<title>Start Listen</title>
		<link rel='stylesheet' media='screen' type='text/css' href='../css/base.css'/>
    </head>
	<body>
        <!-- header -->
		<?php
			VH::instance()->showMainNav();
		?>
		<!-- wrapper-->    
		<div id="wrapper">
			<!-- content -->
            <div id="content">
                <div class='article'>
                    <?php VH::instance()->showShuffleLesson();  ?>
                </div>
                <div class='aside'>
                </div>
            </div>
			<?php
				VH::instance()->showFooter();
			?>
		</div>
	
	</body>
</html>
