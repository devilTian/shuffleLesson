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
	         ->with('INSERT INTO book value(\'\', ?)', array('testbook'));
	    $stub->addNewBook('testbook');

 	    // bookname is null, so throw a Exception
	    $this->setExpectedException('PDOException');
	    $this->book->addNewBook(null);
	}	

 	public function testGetBookName() {
	    $stub = $this->getMock('Book', array('doStatement', 'fetch'));
	    $stub->expects($this->any())
	         ->method('doStatement')
	         ->with('select name from book where id = ?', array(1))
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
	         ->with('delete from book where id = ?', array(1));
	    $stub->deleteABook(1);
	}

	public function testUpdateBookState() {
	    $stub = $this->getMock('Book', array('doStatement'));
	    $stub->expects($this->any())
	         ->method('doStatement')
	         ->with('update book set state = ? where id = ?', array('C', 1));
	    $stub->updateBookState(1, 'C');
	}

	public function tearDown() {
	    unset($this->book);
	}
    } 
?>
