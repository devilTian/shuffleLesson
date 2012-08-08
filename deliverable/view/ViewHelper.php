<?php
	require_once('../db/book.php');

	class VH {
		private $test;
		private static $instance;

		private function __construct() {}

		static public function instance() {
			if ( empty(self::$instance) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
		
		public function showMainNav() {
		    include_once('Layout/mainNav.html');
		}

        public function simpleCharSet() {
            echo "<meta content='text/html;charset=utf-8'>";
        }

		public function showFooter() {
	    	include_once('Layout/footer.html');
		}

		public function showAllBooks() {
			$book = new Book();
			$books = $book->getAllBooks();
            
            $isLast = 1;
			foreach( $books as $book ) {
                if( $isLast == 5 ) {
				    echo "<li class='last'>";
                    $isLast = 1;
                } else {
				    echo "<li class='book_normal'>";
                    $isLast ++;
                }
                echo "<a href='#'>".
                    "<img title='{$book['name']}' src='image/shuffleLesson/mpic/book{$book['id']}.jpg'/>".
					"</li></a>";
			}
		}
	}
?>
