<?php
	require_once('../ViewHelper.php');

    $lessonId = $_POST['lessonId'];
    $score    = $_POST['score'];

    VH::instance()->refreshScore($lessonId, $score);
    VH::instance()->punchCard($lessonId);
    
    echo 'finished';
?>
