<?php
    require_once(__dir__ . '/db.php');

    class Book extends DbBase {
	static $sql = array(
	    'insert' => 'INSERT INTO book value(\'\', ?)',
	    'select' => 'select name from book where id = ?',
	    'delete' => 'delete from book where id = ?'
	);
	
        function addNewBook( $bookName ) {
	    $values = array( $bookName );
            $this->doStatement(self::$sql['insert'], $values);
        }
       
        function getBookName( $bookId ) {
	    $values = array( $bookId );
            $sth    = $this->doStatement(self::$sql['select'], $values);
	    return $this->fetch($sth, PDO::FETCH_ASSOC);
	}

        function deleteABook( $bookId ) {
	    $values = array( $bookId );
	    $this->doStatement(self::$sql['delete'], $values);
	} 
    }


?>
