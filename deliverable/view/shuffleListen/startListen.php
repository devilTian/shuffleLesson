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
        <script type='text/javascript' src='../js/shuffleListen.js'></script>
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
                    <?php $lessonId = VH::instance()->showShuffleLesson();  ?>
                </div>
                <div class='aside'>
                    <?php VH::instance()->showPunchCardBtn($lessonId);  ?>
                </div>
            </div>
			<?php
				VH::instance()->showFooter();
			?>
		</div>
	</body>
</html>
