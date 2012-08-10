<?php
	require_once(__DIR__ . '/../db/book.php');
	require_once(__DIR__ . '/../db/lesson.php');

	class VH {
		private $book;
		private $lesson;
		private static $instance;
		
        private function __construct() {
			if ( !isset($this->book) ) {
				$this->book = new book();
			}
			if ( !isset($this->lesson) ) {
				$this->lesson = new lesson();
			}
        }

		static public function instance() {
			if ( !isset(self::$instance) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
		
		public function showMainNav() {
		    include_once('Layout/mainNav.html');
		}

		public function showShuffleListenNav() {
		    include_once('Layout/shuffleListenNav.html');
		}

        public function simpleCharSet() {
            echo "<meta content='text/html;charset=utf-8'>";
        }

		public function showFooter() {
	    	include_once('Layout/footer.html');
		}

        // on 'listenBook.php'
        public function showSpecBookImg( $bookId ) {
            echo '<div class="listenbook_cover float_left" style="margin-top:3px; margin-right:12px">'.
                "<a href='../image/shuffleLesson/lpic/book{$bookId}.jpg'>".
                "<img title='点击看大图' src='../image/shuffleLesson/mpic/book$bookId.jpg'/>".
                '</a></div>';
        }
        public function showCollectBtn( $id, $state ) {
            $str = "<a class='tab collect_btn' href='modify.php?id=$id'>修改</a>&nbsp;&nbsp;
                <a class='collect_btn' title='删除这个收藏' href='remove.php?id=$id'>删除</a>";
            echo '<div id="bookState">';
            switch( $state ) {
                case 'W':
                    echo "我想听这本书$str";
                    break;
                case 'R':
                    echo "我最近在听这本书$str";
                    break;
                case 'C':
                    echo "我听过这本书$str";
                    break;
                default: //N
                    echo "<input type='button' onclick='modifyBookState($id,\"W\")' value='想听'/>&nbsp;&nbsp;
                         <input type='button' onclick='modifyBookState($id, \"R\")' value='正在听'/>&nbsp;&nbsp;
                         <input type='button' onclick='modifyBookState($id, \"C\")' value='听过'/>";
            }
            echo '</div>';
        }
        public function showAllLessonsFromBook( $bookId ) {
            $lessonData = $this->lesson->getLessonsFromBook($bookId);
            $i = 0;
            $length = count($lessonData);
            
            echo "<div style='border:solid 1px #209E85;border-radius:5px;width:100%'>";
            foreach ( $lessonData as $les ) {
                $score            = $les['les_score'];
                $recordData       = $this->lesson->getRecord($les['les_id']);
                $recordCount      = count($recordData);
                $recordLastedTime = $recordData[0]['datetime'];

                if ( empty($score) ) {
                    $score = '-';
                }
                if ( empty($recordLastedTime) ) {
                    $recordLastedTime = '-';
                }
                if ( $i+1 == $length ) {
                    echo '<div>';
                }
                else if ( $i%2 == 0 ) {
                    echo "<div style='border-bottom:dashed 1px #CCC'>";
                } else {
                    echo "<div style='border-bottom:dashed 1px #CCC; background-color:rgb(233,244,233)'>";
                } 
                $i++;

                echo "<span class='font_bold float_left lessonName margin_all_10'>{$les['les_num']}. {$les['les_name']}</span>
                    <span style='color:#209E85' class='float_right margin_all_10'>分数:<span style='margin-left:1em;color:#C09'>$score</span></span>
                    <br class='clearfix'/><span class='float_left' style='margin:0 0 10 10;color:#555'>听过
                    <span style='margin:0 2px;color:#C09'>{$recordCount}</span>遍</span>
                    <span style='color:#209E85;margin:0 10 10 0' class='float_right'>最近一次听:<span style='margin-left:1em;color:#C09'>$recordLastedTime</span></span>
                    <br class='clearfix'/></div>";
            }
            echo '</div>';
        }

        public function showSpecBookInfo( $bookData ) {
            $bookId        = $bookData['id'];
            $studyProgress = $this->lesson->getStudyProgress($bookId);
            $lessonCount   = $this->lesson->getLessonCount( $bookId );
            echo '<div class="float_left" style="width:100%;padding-bottom:15px;border-bottom:solid 1px #CCC">';
            $this->showSpecBookImg( $bookId );
            echo "<div class='float_left specBookInfo'>
                <div>
                    <span>上传人：</span>
                    <a href='#'>Shanbay</a>
                    <br/>
                </div>
                <div class=''>
                    <span>所属类别：</span>
                    {$bookData['category']}
                    <br/>
                </div>
                <div class='specBookInfo_count'>
                    <span>课文数：</span>
                    $lessonCount
                    <br/>
                </div>
                <div>
                    <span>免费</span>
                    <br/>
                </div>
                <div class='specBookInfo_count'>
                    <span>学习进度：</span>
                    {$studyProgress}%
                    <br/>
                </div>
                </div></div>";
            echo "<div class='clearfix' style='padding:20px 0px 3px'>";
            $this->showCollectBtn($bookId, $bookData['state']);
            echo "</div>";
            
            echo "<div class='clearfix related_info'>
                <h2>内容简介   · · · · · · </h2>
                    <p class='indent'>{$bookData['description']}</p>
                </div>";
            echo "<div class='clearfix related_info'>
                <h2>书中包含文章   · · · · · · </h2>";
            $this->showAllLessonsFromBook($bookId);
            echo "</div>";
        }

		public function showAllBooks() {
			$books = $this->book->getAllBooks();
            
            $isLast = 1;
			foreach( $books as $book ) {
                if( $isLast == 5 ) {
				    echo "<li class='last'>";
                    $isLast = 1;
                } else {
				    echo "<li class='book_normal'>";
                    $isLast ++;
                }
                echo "<a href='listenBook.php?id={$book['id']}'>".
                    "<img title='{$book['name']}' src='../image/shuffleLesson/mpic/book{$book['id']}.jpg'/>".
					"</li></a>";
			}
		}

        public function getSpecifiedBook($bookId) {
			return $this->book->getSpecifiedBook($bookId);
        }

        public function setBookState( $bookId, $newState ) {
            $this->book->updateBookState($bookId, $newState);
        }

        public function showListenBookCategory() {
            $category = $this->book->getCategory();
            echo "<div style='background:#FFF6ED;padding:4px 9px;border:2px solid #FAEFE3;margin-bottom:20px'>
                  <a class='createBook_btn' href='#'>创建听力书</a>
                  </div>
                  <div class='listenBookCategory'>
                  <ul>
                  <h2>听力书分类 · · · · · ·</h2>";
            foreach ( $category as $c ) {
                echo "<li><a href='#'>{$c['category']}</a></li>";
            }
            echo '</ul></div>';
        }
	}
?>
