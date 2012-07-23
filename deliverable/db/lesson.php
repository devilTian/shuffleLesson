<?php
    date_default_timezone_set('Asia/Chongqing');
    require_once(__dir__ . '/db.php');

    class Lesson extends DbBase {
	static $sql = array(
	    'selectLessons' => 'SELECT * FROM lesson WHERE les_bookid = ?',
	    'selectALesson' => 'SELECT * FROM lesson WHERE les_id = ?',
	    'addRecord'     => 'INSERT INTO recordTime VALUE(?, ?)',
	    'shuffleLesson' => 'SELECT * FROM lesson WHERE les_bookid = ? and les_recordid is NULL'
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
	
	//TODO
	function addLesson() {}
	
	//TODO
	function deleteALesson() {}
    }
?>
