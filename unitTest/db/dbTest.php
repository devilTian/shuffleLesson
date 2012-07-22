<?php
    require_once(PATH . '/db/db.php');

    class mockPDO extends PDO {
	function __construct() {}
    }

    class subTest extends DbBase {
        function doStatement( $stmt_s, $values_a ) {
	    return parent::doStatement( $stmt_s, $values_a );
	}
        function fetch(PDOStatement $sth, $fetchStyle) {
            return parent::fetch($sth, $fetchStyle);
	}
    }

    class DbBaseTest extends PHPUnit_Framework_TestCase {
	
	private $subTest;

	public function setUp() {
            $this->subTest = new subTest();

            $stub = $this->getMock('MockPDO', array('prepare', 'lastInsertId', 'fetch'));
	    $stub->expects($this->any())
	         ->method('prepare')
	         ->will($this->returnValue(new PDOStatement()));
	    $stub->expects($this->any())
	         ->method('lastInsertId')
	         ->will($this->returnValue(1));
	    subTest::$DB = $stub;
	}

	public function testGetLastInsertId() {
	    $actual_value = $this->subTest->getLastInsertId();
	    $this->assertEquals($actual_value, 1);
	}

	public function testPrepareStatement() {
	    $actual_value = $this->subTest->prepareStatement('select * from book');
	    $this->assertTrue($actual_value instanceof PDOStatement);
	}

        public function testDoStatement() {
	    $stub_pdoStatement = $this->getMock('PDOStatement', array('closeCursor', 'execute'));
	    $stub_pdoStatement->expects($this->any())
	         	      ->method('closeCursor')
	         	      ->will($this->returnValue(true));
	    $stub_pdoStatement->expects($this->any())
	         	      ->method('execute')
	         	      ->will($this->onConsecutiveCalls(true, false));
            $stub = $this->getMock('subTest', array('prepareStatement'));
	    $stub->expects($this->any())
	         ->method('prepareStatement')
	         ->will($this->returnValue($stub_pdoStatement));

            $actual_value = $stub->doStatement('select * from book where id=?', array(1));
	    $this->assertTrue($actual_value instanceof PDOStatement);

	    // executes a prepared statement unsuccessfully
	    $this->setExpectedException('DbException');
            $stub->doStatement('select * from book where id=?', array(1));
	}

	public function testFetch() {
	    $stub = $this->getMock('PDOStatement', array('fetch'));
	    $stub->expects($this->any())
	         ->method('fetch')
	         ->will($this->returnValue(array('name' => 'OneDay')));
            $actual_value = $this->subTest->fetch($stub, PDO::FETCH_ASSOC);
	    $this->assertEquals($actual_value['name'], 'OneDay');
	}

	public function tearDown() {
	    unset($this->subTest);
	}
    } 
?>
