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

		public function showAllBooks() {
			$book = new Book();
			$books = $book->getAllBooks();

			foreach( $books as $book ) {
				echo "<li class='book_normal'>".
					 "<img title='{$book['name']}' src='image/book{$book['id']}_normal.jpg'/>".
					 "</li>";
			}
		}
	}
?>
