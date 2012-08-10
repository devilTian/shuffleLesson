<?php
    require_once(__dir__ . '/db.php');

    class Book extends DbBase {
		static $sql = array(
			'selectAllBooks'=> 'SELECT * FROM book',
	    	'insert'        => 'INSERT INTO book value(\'\', ?, ?, ?)',
	 	   	'delete' 	    => 'delete from book where id = ?',
		    'update'        => 'update book set state = ? where id = ?',
            'getSpecBook'   => 'select * from book where id = ?',
            'getCategory'   => 'SELECT DISTINCT category FROM book',
            'getBooksByStat'=> 'SELECT * FROM book WHERE state = ?'
		); 
	
        function addNewBook( $bookName, $category=null, $description=null ) {
	    	$values = array( $bookName, $category, $description);
            $this->doStatement(self::$sql['insert'], $values);
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
            $sth = $this->doStatement(self::$sql['selectAllBooks'], array());
		    return $this->fetchAll($sth, PDO::FETCH_ASSOC);
		}

        function getSpecifiedBook( $bookId ) {
		    $values = array( $bookId );
            $sth    = $this->doStatement(self::$sql['getSpecBook'], $values);
		    return $this->fetch($sth, PDO::FETCH_ASSOC);
        }

        function getCategory() {
            $sth = $this->doStatement(self::$sql['getCategory'], array());
		    return $this->fetchAll($sth, PDO::FETCH_ASSOC);
        }

        #TODO UNITTEST
        function getBooksByStat( $state ) {
            $values = array( $state );
            $sth    = $this->doStatement(self::$sql['getBooksByStat'], $values);
		    return $this->fetchAll($sth, PDO::FETCH_ASSOC);
        }
    }
?>
