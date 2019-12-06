<?php
	require('app/models/news.php');
	
	class NewsController extends NewsModel{
		//đăng bài
		public function postAdd(){
			if($_SESSION['sumPer']==255)
			{
				if( isset($_POST['add_news']) && $_POST['txtName'] != NULL&& $_POST['txtContent'] != NULL ){

					

					$path = 'public/img_news/';
					$tmp_name = $_FILES['image']['tmp_name'];
					$name =	$_FILES['image']['name'];
					$type = $_FILES['image']['type']; 
					$size = $_FILES['image']['size'];

					$news = $_POST;
					$news['image'] = $name;
					$news['author'] = $_SESSION['user']['fullname'];
					$news['date'] = date('Y-m-d',time());
					$check = parent::postnews($news);
					if($check == TRUE){

							// Upload file
						move_uploaded_file($tmp_name,$path.$name);
						echo "<script>alert('Success add news')</script>";
						echo "<script type='text/javascript'>
								window.location = '/kit_club'
							</script>";

					}
					else{

						echo "<script>alert('Failed add news')</script>";
						echo '<script>history.go(-1)</script>';

					}


				}
				else{
					require('app/views/news/add.php');
					// echo "<script>alert('Failed. Fill correct input')</script>";
					// echo '<script>history.go(-1)</script>';
				}
			}
			else
			{
				echo "<script type='text/javascript'>
				window.location = '/kit_club'
			</script>";

			}

		}
		public function detail($id){
			$homeDetailNews = parent::getnew($id);
			require('app/views/home/pages/details.php');

		}
		

	}