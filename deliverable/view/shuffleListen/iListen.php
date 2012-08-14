<?php
	require_once('../ViewHelper.php');
?>
<html>
    <head>
        <?php
			VH::instance()->simpleCharSet();
		?>
		<title>iListen</title>
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
                    <div class="float_left" style="margin-top:5px">
                        <h3>进步曲线</h3>
                        <br/>
                        <div style='background-color:pink;height:300px;width:590px;'>&nbsp;</div>
                    </div>
                    <br class='clearfix'/>
                    <br/><br/>

                    <div class="float_left" style="margin-top:5px">
                        <h3>每日复习盘点</h3>
                        <br/>
                        <div style='background-color:#77FFAA;height:300px;width:590px;'>&nbsp;</div>
                    </div>
                    <br class='clearfix'/>
                    <br/><br/>

                    <div class="float_left" style="margin-top:5px">
                        <h3>正在听的书</h3>(&nbsp;<a href='#'>More</a>&nbsp;)
                        <br/>
                        <?php VH::instance()->showBooksByStat('R'); ?>
                    </div>
                    <br class='clearfix'/>
                    <br/><br/>

                    <div class="float_left" style="margin-top:5px">
                        <h3>想听的书</h3>(&nbsp;<a href='#'>More</a>&nbsp;)
                        <br/>
                        <?php VH::instance()->showBooksByStat('W'); ?>
                    </div>
                    <br class='clearfix'/>
                    <br/><br/>

                    <div class="float_left" style="margin-top:5px">
                        <h3>已经听过的书</h3>(&nbsp;<a href='#'>More</a>&nbsp;)
                        <br/>
                        <?php VH::instance()->showBooksByStat('C'); ?>
                    </div>
                    <br class='clearfix'/>
                </div>
                <div class='aside'>
                    <?php VH::instance()->showStartListenBtn() ?>
                </div>
            </div>
			<?php
				VH::instance()->showFooter();
			?>
		</div>
	
	</body>
</html>
