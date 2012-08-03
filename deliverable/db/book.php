<?php
    require_once(__dir__ . '/db.php');

    class Book extends DbBase {
		static $sql = array(
			'selectAllBooks'=> 'SELECT * FROM book',
	    	'insert'        => 'INSERT INTO book value(\'\', ?)',
	 	   	'selectABook'   => 'select name from book where id = ?',
	 	   	'delete' 	    => 'delete from book where id = ?',
		    'update'        => 'update book set state = ? where id = ?'
		);
	
        function addNewBook( $bookName ) {
	    	$values = array( $bookName );
            $this->doStatement(self::$sql['insert'], $values);
        }
       
        function getBookName( $bookId ) {
		    $values = array( $bookId );
            $sth    = $this->doStatement(self::$sql['selectABook'], $values);
		    return $this->fetch($sth, PDO::FETCH_ASSOC);
		}

        function deleteABook( $bookId ) {
	    	$values = array( $bookId );
	  		$this->doStatement(self::$sql['delete'], $values);
		}

		function updateBookState( $bookId, $state ) {
			$values = array( $state, $bookId );
			$this->doStatement(self::$sql['update'], $values);
		}
		
		function getAllBooks() {
            $sth    = $this->doStatement(self::$sql['selectAllBooks'], array());
		    return $this->fetchAll($sth, PDO::FETCH_ASSOC);
		}
    }
?>
