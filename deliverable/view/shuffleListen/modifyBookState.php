<?php
	require_once('view/ViewHelper.php');

    $id    = $_POST['bookId'];
    $state = $_POST['newState'];
    VH::instance()->setBookState( $id, $state );

    echo VH::instance()->showCollectBtn( $id, $state);
?>
