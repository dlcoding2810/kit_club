<?php
/**
 * @package		Website clb_kit
 * @author 		Teamweb
 * @copyright 	Copyright (c) 10/2019
 * @since 		Version 1.0
 * @filesource 	admin/controllers/member.php
 */

require('admin/models/news.php');
require('admin/models/paginate.php');
class NewsController extends NewsModel
{
    public function uploadImages($path, $nameTag)
    {
        // $img = $_POST['img'];
        $error       = "";
        $target_dir  = $path;
        $targetImage = $target_dir . basename($_FILES[$nameTag]['name']);
        $typeImage   = pathinfo($_FILES[$nameTag]['name'], PATHINFO_EXTENSION); // lấy kiêu file người dùng upload
        $sizeImage   = $_FILES[$nameTag]['size'];
        $typeAllow   = array(
            'png',
            'jpg',
            'jpeg'
        ); // kiểu file cho phép
        // validate type img
        if (!in_array(strtolower($typeImage), $typeAllow)) {
            $error .= "Ảnh bạn tải lên không được hỗ trợ";
        }
        // validate img size
        if ($sizeImage > 5242880) {
            $error .= " Ảnh của bạn không được vượt quá 5mb";
        }
        // check img exist
        if (file_exists($targetImage)) {
            $error .= " Ảnh đã tồn tại";
        }
        if ($error == "") {
            if (move_uploaded_file($_FILES[$nameTag]['tmp_name'], $targetImage)) {
                // echo "Upload thành công";
                return $_FILES[$nameTag]['name'];
            }	
        } else {
            echo "<script>alert('" . $error . "')</script>";
            return false;
        }
    }
    
    public function postAdd()
    {
        
        if (isset($_POST['add_news']) && $_POST['txtName'] != NULL && $_POST['txtContent'] != NULL) {
            
            
            
            // $path     = 'public/img_news/';
            // $tmp_name = $_FILES['image']['tmp_name'];
            // $name     = $_FILES['image']['name'];
            // $type     = $_FILES['image']['type'];
            // $size     = $_FILES['image']['size'];
            
            $news           = $_POST;
            $news['author'] = $_SESSION['user']['fullname'];
            $news['date']   = date('Y-m-d', time());
            
            $news['image'] = $this->uploadImages('public/img_news/thumbnail/' . $news['tag'] . '/', "image");
            // Upload file
            if ($news['image']) {
                $check = parent::admin_post_news($news);
                if ($check == TRUE) {
                    echo "<script>alert('Success add news')</script>";
                    echo "<script type='text/javascript'>
					           window.location = '/kit_club/admin.php?url=news/listAll'
					      </script>";
                } else {
                    echo "<script>alert('Failed add news')</script>";
                    echo '<script>history.go(-1)</script>';
                    
                }
                
            } else {
                echo '<script>history.go(-1)</script>';
                
                
            }
            
            
        } else {
            require('admin/views/news/add.php');
            // echo "<script>alert('Failed. Fill correct input')</script>";
            // echo '<script>history.go(-1)</script>';
        }
        
    }
    
    public function listAll()
    {
        $rows = parent::admin_list_news();
        if ($rows == 0) {
            echo "Dữ liệu không có!";
            return;
        }
        //Phần trang
        $paginate = new PaginateModel;
        $limit    = 5;
        $start    = $paginate->findStart($limit);
        $count    = count($rows);
        $sumpage  = $paginate->findPages($count, $limit);
        
        $news = parent::admin_list_limit($start, $limit);
        require('admin/views/news/list.php');
        
    }
    
    public function delete($id)
    {
       
		
        $news  = parent::admin_find_news($id);
        // $path =" public/img_news/thumbnail/". $news['tags'] ."/";
        $check = parent::admin_delete_news($id);

        
        if ($check == TRUE) {
        	unlink("public/img_news/thumbnail/".$news['tags']."/".$news['images']);
            echo "<script>alert('Success Delete News')</script>";
            echo "<script type='text/javascript'>
					           window.location = '/kit_club/admin.php?url=news/listAll'
					      </script>";
        } else {
            echo "<script>alert('Fail Delete News')</script>";
            echo "<script type='text/javascript'>
					           history.go(-1)
					      </script>";
        }
    }
    
    public function edit($id)
    {
        
        $news = parent::admin_find_news($id);
        require('admin/views/news/edit.php');
        
    }
    public function postEdit($id){
			if($_SESSION['sumPer']==4095)
			{
				if(isset($_POST['edit_news'])){
					
					$edit = $_POST;
				// 	echo print_r($edit);
				// return;
					if($edit['txtName'] == NULL || $edit['txtContent'] == NULL){
						echo "<script>alert('Fail Edit News')</script>";
						echo "<script type='text/javascript'>
								history.go(-1)
							</script>";					
					}
					else{
						$news = parent::admin_find_news($id);
						if(!empty($_FILES['image']['name']) && ($_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/jpeg')){
							$path = 'public/img_news/';
							$tmp_name = $_FILES['image']['tmp_name'];
							$name =$_FILES['image']['name'];
							$edit['image'] = $name;
						}
						else{
							$edit['image'] = $news['images'];
						}
						
						$edit['id'] = $id;
						
						if($this->uploadImages('public/img_news/thumbnail/' . $news['tags'] . '/', "image")){
							$check = parent::admin_edit_news($edit);
							if($check == true){
								if($edit['image'] != $news['images']){
							// echo "public/img_news/".$news['tags']."/".$news['images'];
									if(file_exists("public/img_news/thumbnail/".$news['tags']."/".$news['images'])){
										unlink("public/img_news/thumbnail/".$news['tags']."/".$news['images']);
									}
								
								// move_uploaded_file($tmp_name,$path.$name);
								// return;
								}		
							echo "<script>alert('Success Edit News')</script>";
							echo "<script type='text/javascript'>
								history.go(-2)
							</script>";		
							}
							else{
								echo "<script>alert('Fail Edit News')</script>";
								echo "<script type='text/javascript'>
										history.go(-1)
									</script>";
							}
						}
						else{
							echo "<script type='text/javascript'>
										history.go(-1)
									</script>";
						}
					}
				}
				else{
					echo "<script>alert('Fail Edit News')</script>";
					echo "<script type='text/javascript'>
								history.go(-1)
							</script>";
				}
			}
			else{
				echo "<script type='text/javascript'>
								window.location = '/kit_club'
							</script>";
			}
		}
    
    public function search($keysearch)
    {
        $rows = parent::admin_search_news($keysearch);
        if ($rows == null) {
            echo '<h1 align="center">không tìm thấy kết quả phù hợp!</h1>';
            return;
        }
        require('admin/views/news/search.php');
    }
    
}