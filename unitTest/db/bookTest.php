<?php
    require_once(PATH . '/db/book.php');
   
    class BookTest extends PHPUnit_Framework_TestCase {
	
        private $book;
	
	public function setUp() {
            $this->book = new Book();
	}

	public function testAddNewBook() {
	    // add a new book successfully
	    $stub = $this->getMock('Book', array('doStatement'));
	    $stub->expects($this->any())
	         ->method('doStatement')
	         ->with($this->equalTo('INSERT INTO book value(\'\', ?)'));
	    $stub->addNewBook('testbook');

 	    // bookname is null, so throw a Exception
	    $this->setExpectedException('PDOException');
	    $this->book->addNewBook(null);
	}	

 	public function testGetBookName() {
	    $stub = $this->getMock('Book', array('doStatement', 'fetch'));
	    $stub->expects($this->any())
	         ->method('doStatement')
	         ->with($this->equalTo('select name from book where id = ?', 1))
	         ->will($this->returnValue(new PDOStatement()));
	    $stub->expects($this->any())
	         ->method('fetch')
	         ->will($this->returnValue(array('name' => 'testbook')));
	    $actual_value   = $stub->getBookName(1);
	    $expected_value = array( 'name' => 'testbook' ); 
	    $this->assertEquals($actual_value, $expected_value);
	}

	public function testDeleteABook() {
	    $stub = $this->getMock('Book', array('doStatement'));
	    $stub->expects($this->any())
	         ->method('doStatement')
	         ->with($this->equalTo('delete from book where name = ?', 1));
	    $stub->deleteABook('testbook');
	}

	public function tearDown() {
	    unset($this->book);
	}
    } 
?>
