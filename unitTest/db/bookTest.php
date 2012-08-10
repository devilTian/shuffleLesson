<?php
    require_once('deliverable/db/book.php');
   
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
	         ->with('INSERT INTO book value(\'\', ?, ?, ?)', array('testbook', null, null));
		    $stub->addNewBook('testbook');

 		    // bookname is null, so throw a Exception
	    	$this->setExpectedException('PDOException');
		    $this->book->addNewBook(null);
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

		public function testGetAllBooks() {
            $stub = $this->getMock('Book', array('doStatement', 'fetchAll'));
	        $stub->expects($this->any())
	        	 ->method('doStatement')
	        	 ->with('SELECT * FROM book', array())
				 ->will($this->returnValue(new PDOStatement()));
		    $stub->expects($this->any())
		         ->method('fetchAll')
	    	     ->will($this->returnValue(array('name' => 'testbook')));
	    	$actual_value   = $stub->getAllBooks();
		    $expected_value = array( 'name' => 'testbook' ); 
		    $this->assertEquals($actual_value, $expected_value);
	    }
	
     	public function testGetSpecifiedBook() {
		    $stub = $this->getMock('Book', array('doStatement', 'fetch'));
	        $stub->expects($this->any())
	        	 ->method('doStatement')
	        	 ->with('select * from book where id = ?', array(1))
				 ->will($this->returnValue(new PDOStatement()));
		    $stub->expects($this->any())
		         ->method('fetch')
	    	     ->will($this->returnValue(array('id' => 1, 'name' => 'testbook', 'state' => 'N', 'category' => 'test', 'description' => null)));
	    	$actual_value   = $stub->getSpecifiedBook(1);
		    $expected_value = array('id' => 1, 'name' => 'testbook', 'state' => 'N', 'category' => 'test', 'description' => null ); 
		    $this->assertEquals($actual_value, $expected_value);
		}

        public function testGetCategory() {
            $stub = $this->getMock('Book', array('doStatement', 'fetchAll'));
	        $stub->expects($this->any())
	        	 ->method('doStatement')
	        	 ->with('SELECT DISTINCT category FROM book', array())
				 ->will($this->returnValue(new PDOStatement()));
		    $stub->expects($this->any())
		         ->method('fetchAll')
	    	     ->will($this->returnValue(array('category' => 'listentothis')));
	    	$actual_value   = $stub->getCategory();
		    $expected_value = array( 'category' => 'listentothis' ); 
		    $this->assertEquals($actual_value, $expected_value);
        }

        public function testGetBooksByStat() {
            $stub = $this->getMock('Book', array('doStatement', 'fetchAll'));
		    $expected_value = array( array('id'=>1,'name'=>'test','state'=>'C','category'=>'test','description'=>null,) ); 
	        $stub->expects($this->any())
	        	 ->method('doStatement')
	        	 ->with('SELECT * FROM book WHERE state = ?', array('C'))
				 ->will($this->returnValue(new PDOStatement()));
		    $stub->expects($this->any())
		         ->method('fetchAll')
	    	     ->will($this->returnValue($expected_value));
	    	$actual_value   = $stub->getBooksByStat('C');
		    $this->assertEquals($actual_value, $expected_value);
        }

		public function tearDown() {
		    unset($this->book);
		}
	} 
?>
