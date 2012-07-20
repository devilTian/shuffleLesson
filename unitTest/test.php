<?php
   require_once(aPATH);

   class DbTest extends PHPUnit_Framework_TestCase {
	public function setUp() {}

 	public function testDb() {
            $book = new book();
	    $result = $book->selectABook(1);
	    $x = $result->fetchColumn(1);
	    $y = $result->fetchColumn(1);
	    $this->assertEquals($x, 1);
	    $this->assertEquals($y, 2);
	}

	public function tearDown() {}
    }
    

?>
