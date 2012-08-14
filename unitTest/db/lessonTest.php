<?php
    require_once('db/lesson.php');
   
    class subLesson extends Lesson {
		public function shuffleAlgorithm($fetResult) {
	    	return parent::shuffleAlgorithm($fetResult);
		}
    }

    class LessonTest extends PHPUnit_Framework_TestCase {
	
        private $lesson;
        private $pdoStatInstance;
        private $lessonData;
	
	    public function setUp() {
	        $this->lesson = new subLesson();
            $this->pdoStatInstance = new PDOStatement();

            //fake data 
            $this->lessonData = array(
                array('les_id' => 1, 'les_num'   => 1, 'les_name'   => 't1',
                    'les_unit' => 1, 'les_score' => 1, 'les_bookId' => 1),
                array('les_id' => 2, 'les_num'   => 2, 'les_name'   => 't2',
                    'les_unit' => 1, 'les_score' => 1, 'les_bookId' => 1),
                array('les_id' => 3, 'les_num'   => 3, 'les_name'   => 't3',
                    'les_unit' => 1, 'les_score' => 1, 'les_bookId' => 2),
                array('les_id' => 4, 'les_num'   => 4, 'les_name'   => 't4',
                    'les_unit' => 1, 'les_score' => 1, 'les_bookId' => 2)
            );
    	}

	    public function testGetLessonsFromBook() {
	        $stub = $this->getMock('Lesson', array('doStatement', 'fetchAll'));
    	    $stub->expects($this->any())
	             ->method('doStatement')
    	         ->with('SELECT * FROM lesson WHERE les_bookid = ?', array(1))
	    	     ->will($this->returnValue($this->pdoStatInstance));
	        $stub->expects($this->any())
    	         ->method('fetchAll')
        		 ->will($this->returnValue(array()));
    	    $actual_value = $stub->getLessonsFromBook(1);
	        $this->assertEquals($actual_value, array());
    	}

	    public function testRefreshRecord() {
	        $stub = $this->getMock('Lesson', array('doStatement'));
    	    $stub->expects($this->any())
	             ->method('doStatement')
	             ->with('INSERT INTO recordTime VALUE(?, ?)', array(1, date('Y-m-d H:i:s')));
    	    $stub->refreshRecord(1);
	    }

    	public function testGetALesson() {
	        $stub = $this->getMock('Lesson', array('doStatement', 'fetch'));
	        $stub->expects($this->any())
	             ->method('doStatement')
    	         ->with('SELECT * FROM lesson WHERE les_id = ?', array(1))
	    	     ->will($this->returnValue($this->pdoStatInstance));
	        $stub->expects($this->any())
	             ->method('fetch')
    	    	 ->will($this->returnValue(array()));
    	    $actual_value = $stub->getALesson(1);
	        $this->assertEquals($actual_value, array());
    	}

	    public function testShuffleAlgorithm() {
	        $actual_value = $this->lesson->shuffleAlgorithm($this->lessonData);
    	    $this->assertLessThanOrEqual($actual_value['les_id'], 1);
	        $this->assertGreaterThanOrEqual($actual_value['les_id'], 4);
    	}

    	public function testShuffleLesson() {
            $actual_sql = 'SELECT * FROM lesson WHERE les_bookid IN (?,?) AND les_id not in  (select les_id from recordTime where les_id in (SELECT les_id FROM lesson WHERE les_bookid IN (?,?) ))';
	        $stub = $this->getMock('Lesson', array('doStatement', 'fetchAll', 'shuffleAlgorithm'));
    	    $stub->expects($this->any())
	             ->method('doStatement')
	             ->with($actual_sql, array(1, 2, 1, 2))
        		 ->will($this->returnValue($this->pdoStatInstance));
	        $stub->expects($this->any())
	             ->method('fetchAll')
        		 ->will($this->returnValue($this->lessonData));
	        $stub->expects($this->any())
	             ->method('shuffleAlgorithm')
                 ->with($this->lessonData)
        		 ->will($this->returnValue($this->lessonData[0]));
	        $actual_value = $stub->shuffleLesson(array(1,2));
    	    $this->assertEquals($actual_value, $this->lessonData[0]);
    	}
    
        public function testGetRecord() {
            $stub = $this->getMock('Lesson', array('doStatement', 'fetchAll'));
            $stub->expects($this->any())
                 ->method('doStatement')
                 ->with('SELECT datetime FROM recordTime WHERE les_id = ? ORDER BY datetime DESC', array(1))
        		 ->will($this->returnValue($this->pdoStatInstance));
	        $stub->expects($this->any())
	             ->method('fetchAll')
        		 ->will($this->returnValue(array('2011 11-11-11 12:12:12')));
	        $actual_value = $stub->getRecord(1);
    	    $this->assertEquals($actual_value, array('2011 11-11-11 12:12:12'));
        }

        public function testGetLessonCount() {
            $stub = $this->getMock('Lesson', array('doStatement', 'fetch'));
            $stub->expects($this->any())
                 ->method('doStatement')
                 ->with('SELECT COUNT(*) AS sum FROM lesson WHERE les_bookid=?', array(2))
        		 ->will($this->returnValue($this->pdoStatInstance));
	        $stub->expects($this->any())
	             ->method('fetch')
        		 ->will($this->returnValue(array('sum' => '96')));
	        $actual_value = $stub->getLessonCount(2);
    	    $this->assertEquals($actual_value, 96);
        }

        public function testGetStudyProgress() {
            $stub = $this->getMock('Lesson', array('doStatement', 'fetch', 'getLessonCount'));
            $stub->expects($this->any())
                 ->method('doStatement')
                 ->with('SELECT COUNT(DISTINCT les_id) AS hasListenedCount FROM recordTime WHERE les_id IN (select les_id from lesson where les_bookid=?)', array(2))
        		 ->will($this->returnValue($this->pdoStatInstance));
	        $stub->expects($this->any())
	             ->method('fetch')
        		 ->will($this->returnValue(array('hasListenedCount' => '3')));
	        $stub->expects($this->any())
	             ->method('getLessonCount')
        		 ->will($this->returnValue(96));
	        $actual_value = $stub->getStudyProgress(2);
    	    $this->assertEquals($actual_value, 3.1);
        }

        public function testRefreshScore() {
	        $stub = $this->getMock('Lesson', array('doStatement'));
    	    $stub->expects($this->any())
	             ->method('doStatement')
	             ->with('UPDATE lesson SET les_score = ? WHERE les_id = ?', array(1,5));
    	    $stub->refreshScore(5,1);
        }

	    public function tearDown() {
	        unset($this->lesson);
            unset($this->pdoStatInstance);
            unset($this->lessonData);
    	}
    } 
?>
