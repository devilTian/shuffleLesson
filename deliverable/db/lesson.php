<?php
date_default_timezone_set('Asia/Chongqing');
require_once(__dir__ . '/db.php');

class Lesson extends DbBase {
	static $sql = array(
	    'selectLessons' => 'SELECT * FROM lesson WHERE les_bookid = ?',
	    'selectALesson' => 'SELECT * FROM lesson WHERE les_id = ?',
	    'addRecord'     => 'INSERT INTO recordTime VALUE(?, ?)',
	    'shuffleLesson' => 'SELECT * FROM lesson WHERE les_bookid = ? AND les_id not in  (select les_id from recordTime where les_id in (SELECT les_id FROM lesson WHERE les_bookid = ?));',
        'getRecord'     => 'SELECT datetime FROM recordTime WHERE les_id = ? ORDER BY datetime DESC',
        'getLessonCount'=> 'SELECT COUNT(*) AS sum FROM lesson WHERE les_bookid=?',
        'getProgress'   => 'SELECT COUNT(DISTINCT les_id) AS hasListenedCount FROM recordTime WHERE les_id IN (select les_id from lesson where les_bookid=?)'
	);

	function getLessonsFromBook( $bookId ) {
	    $values = array( $bookId );
        $sth    = $this->doStatement(self::$sql['selectLessons'], $values);
	    return $this->fetchAll($sth, PDO::FETCH_ASSOC);
	}
	
	function updateRecord( $lessonId ) {
	    $values = array( $lessonId, date('Y-m-d H:i:s') );
        $sth    = $this->doStatement(self::$sql['addRecord'], $values);
	}

	function getALesson( $lessonId ) {
        $values = array( $lessonId );
        $sth    = $this->doStatement(self::$sql['selectALesson'], $values);
	    return $this->fetch($sth, PDO::FETCH_ASSOC);
    }

	protected function shuffleAlgorithm($fetResult) {
	    $shuffleId = mt_rand(0, count($fetResult)-1);
	    return $fetResult[$shuffleId];
	}

	function shuffleLesson( $bookId ) {
        $values    = array( $bookId );
        $sth       = $this->doStatement(self::$sql['shuffleLesson'], $values);
	    $fetResult = $this->fetchAll($sth, PDO::FETCH_ASSOC);
	    return $this->shuffleAlgorithm($fetResult);
	}
	
    function getRecord( $lessonId ) {
        $values = array( $lessonId);
        $sth    = $this->doStatement(self::$sql['getRecord'], $values);
	    return $this->fetchAll($sth, PDO::FETCH_ASSOC);
    }

    function getLessonCount( $bookId) {
        $values    = array( $bookId );
        $sth       = $this->doStatement(self::$sql['getLessonCount'], $values);
	    $result    = $this->fetch($sth, PDO::FETCH_ASSOC);
        return $result['sum'];
    }

    function getStudyProgress( $bookId ) {
        $values    = array( $bookId );
        $sth       = $this->doStatement(self::$sql['getProgress'], $values);
	    $result    = $this->fetch($sth, PDO::FETCH_ASSOC);
        return $result['hasListenedCount']/($this->getLessonCount( $bookId )) * 100;
    }

	//TODO
	function addLesson() {}
	
	//TODO
	function deleteALesson() {}
}
?>
