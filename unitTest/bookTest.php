<?php
    require_once(PATH);
   
    class BookTest extends PHPUnit_Framework_TestCase {
	
        private $book;
	
	public function setUp() {
            $this->book = new Book();
	}

 	public function testGetBookName() {
	    $actual_value   = $this->book->getBookName(1);
	    $expected_value = array( 'name' => 'NEW CONCEPT ENGLISH' ); 
	    $this->assertEquals($actual_value, $expected_value);
	}

	public function testAddNewBook() {

	}
    } 

?>
