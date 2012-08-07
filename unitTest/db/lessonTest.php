<?php
    require_once('deliverable/db/lesson.php');
   
    class subLesson extends Lesson {
		public function shuffleAlgorithm($fetResult) {
	    	return parent::shuffleAlgorithm($fetResult);
		}
    }

    class LessonTest extends PHPUnit_Framework_TestCase {
	
        private $lesson;
	
	public function setUp() {
	    $this->lesson = new subLesson();
	}

	public function testGetLessonsFromBook() {
	    $stub = $this->getMock('Lesson', array('doStatement', 'fetchAll'));
	    $stub->expects($this->any())
	         ->method('doStatement')
	         ->with('SELECT * FROM lesson WHERE les_bookid = ?', array(1))
		 ->will($this->returnValue(new PDOStatement()));
	    $stub->expects($this->any())
	         ->method('fetchAll')
		 ->will($this->returnValue(array()));
	    $actual_value = $stub->getLessonsFromBook(1);
	    $this->assertEquals($actual_value, array());
	}

	public function testUpdateRecord() {
	    $stub = $this->getMock('Lesson', array('doStatement'));
	    $stub->expects($this->any())
	         ->method('doStatement')
	         ->with('INSERT INTO recordTime VALUE(?, ?)', array(1, date('Y-m-d H:i:s')));
	    $stub->updateRecord(1);
	}

	public function testGetALesson() {
	    $stub = $this->getMock('Lesson', array('doStatement', 'fetch'));
	    $stub->expects($this->any())
	         ->method('doStatement')
	         ->with('SELECT * FROM lesson WHERE les_id = ?', array(1))
		 ->will($this->returnValue(new PDOStatement()));
	    $stub->expects($this->any())
	         ->method('fetch')
		 ->will($this->returnValue(array()));
	    $actual_value = $stub->getALesson(1);
	    $this->assertEquals($actual_value, array());
	}

	public function testShuffleAlgorithm() {
	    $testArr      = array(1, 2, 3, 4, 5);
	    $actual_value = $this->lesson->shuffleAlgorithm($testArr);
	    $this->assertLessThanOrEqual($actual_value, 1);
	    $this->assertGreaterThanOrEqual($actual_value, 5);
	}

	public function testShuffleLesson() {
	    $stub = $this->getMock('Lesson', array('doStatement', 'fetchAll', 'shuffleAlgorithm'));
	    $stub->expects($this->any())
	         ->method('doStatement')
	         ->with('SELECT * FROM lesson WHERE les_bookid = ? and les_recordid is NULL', array(1))
		 ->will($this->returnValue(new PDOStatement()));
	    $stub->expects($this->any())
	         ->method('fetchAll')
		 ->will($this->returnValue(array(1, 2, 3)));
	    $stub->expects($this->any())
	         ->method('shuffleAlgorithm')
		 ->will($this->returnValue(array(2)));
	    $actual_value = $stub->shuffleLesson(1);
	    $this->assertEquals($actual_value, array(2));
	}

	public function tearDown() {
	    unset($this->lesson);
	}
    } 
?>
