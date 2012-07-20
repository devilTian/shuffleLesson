<?php
    require_once('/usr/local/apache2/htdocs/git_dt/shuffleLesson/deliverable/exception/exception.php');
    abstract class DbBase {
	static $DB;
	static $stmts = array();
	
	function __construct() {
	    #TODO
	    $dsn  = 'mysql:host=localhost;dbname=shuffleLesson';
	    $user = 'root';
	    $pwd  = '123123';

	    if ( is_null( $dsn ) ) {
		throw new DbException('No DSN');
	    }
	    self::$DB = new PDO( $dsn, $user, $pwd );
	    self::$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	function getLastInsertId() {
	    return self::$DB->lastInsertId();
	}

	function prepareStatement( $stmt_s ) {
	    if ( isset( self::$stmts[$stmt_s] ) ) {
		return self::$stmts[$stmt_s];
	    }
	    $stmt_handle = self::$DB->prepare( $stmt_s );
	    self::$stmts[$stmt_s] = $stmt_handle;
	    return $stmt_handle;
	}

	/*
	** @return boolean.
	*/
	protected function doStatement( $stmt_s, $values_a) {
	    $sth = $this->prepareStatement( $stmt_s );
	    $sth->closeCursor();
	    $result = $sth->execute( $values_a );
	    if ( !$result ) {
	        throw new DbException("sql statement->[$stmt_s] can`t be executed successfully!");
	    }
	    return $sth;
	}
	
	/*
	** @param $fetchStyle. 
	**  Controls how the next row will be returned to the caller.
	*/
        protected function fetch(PDOStatement $sth, $fetchStyle) {
	    return $sth->fetch($fetchStyle);
        }
    }

    class Book extends DbBase {

        function addNewBook( $bookName ) {
    	    $sql = 'INSERT INTO book value("", ?)';
	    $values = array( $bookName );
            $this->doStatement($sql, $values);
        }
       
        function getBookName( $bookId ) {
    	    $sql = 'select name from book where id = ' . $bookId;
	    $values = array( $bookId );
            $sth =  $this->doStatement($sql, $values);
	    return $this->fetch($sth, PDO::FETCH_ASSOC);
	}
    }

?>
