<?php
    require_once(PATH);

    class subTest extends DbBase {}
   
    class DbTest extends PHPUnit_Framework_TestCase {
	
	private $subTest;

	public function setUp() {
            $this->subTest = new subTest();
	}

	public function testGetLastInsertId() {
	    $actual_value = $this->subTest->getLastInsertId();
	    $this->assertLessThanOrEqual($actual_value, 0);
	}

	public function testPrepareStatement() {
            $stub = $this->getMock('PDO', array(), array('mysql:host=localhost;dbname=shuffleLesson', 'root', '123123'));
	    $stub->expects($this->any())
		 ->method('prepare')
	         ->will($this->returnValue(new PDOStatement()));
	    $actual_value = $this->subTest->prepareStatement('select * from book');
	    $this->assertTrue($actual_value instanceof PDOStatement);
	}

        public function testDoStatement() {
            $stub_1 = $this->getMock('SubTest');
	    $stub_1->expects($this->any())
	         ->method('prepareStatement')
	         ->will($this->returnValue(new PDOStatement()));

            $stub = $this->getMock('PDO', array(), array('mysql:host=localhost;dbname=shuffleLesson', 'root', '123123'));
	    $stub->expects($this->any())
		 ->method('closeCursor')
	         ->will($this->returnValue(TRUE));
	    $stub->expects($this->any())
		 ->method('execute')
	         ->will($this->returnValue(TRUE));

	//    $actual_value = $this->subTest->doStatement('select * from book where id=?', array(1));
	  //  $this->assertTrue($actual_value instanceof PDOStatement);
	    
	}

	public function tearDown() {
	    unset($this->subTest);
	}
    } 
?>
