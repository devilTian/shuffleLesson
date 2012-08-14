<?php
	require_once('view/ViewHelper.php');
?>
<html>
    <head>
        <?php
			VH::instance()->simpleCharSet();
		?>
		<title>Start Listen</title>
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
			<!-- content -->
            <div id="content">
                <div class='article'>
                    <?php $lessonId = VH::instance()->showShuffleLesson();  ?>
                </div>
                <div class='aside'>
                    <?php
                        if( $lessonId != false) {
                            echo "<div id='punchCardArea'>";
                            VH::instance()->showScoreBtn();
                            VH::instance()->showPunchCardBtn($lessonId);
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
			<?php
				VH::instance()->showFooter();
			?>
		</div>
	</body>
</html>
