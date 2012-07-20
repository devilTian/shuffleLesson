<?php
    abstract class Base {
	static $DB;
	static $stmts = array();
	
	function __construct() {
	    #TODO
	    $dsn  = 'mysql:host=localhost;dbname=shuffleLesson';
	    $user = 'root';
	    $pwd  = '123123';

	    if ( is_null( $dsn ) ) {
		throw new Exception('No DSN');
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

	protected function doStatement( $stmt_s, $values_a) {
	    $sth = $this->prepareStatement( $stmt_s );
	    $sth->closeCursor();
	    $db_result = $sth->execute( $values_a );
	    return $sth;
	}
    }

    class book extends Base {
        function selectABook( $bookId ) {
    	    $sql = 'select * from lesson where les_bookid = ' . $bookId;
	    $values = array( $bookId );
            return $this->doStatement($sql, $values);
	}
    }
?>
