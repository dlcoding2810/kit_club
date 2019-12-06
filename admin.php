<?php
session_start();
?>
<?php

// echo $_SESSION['sumPer'];
// return ;
if(isset($_SESSION['user']) && $_SESSION['sumPer']>=4095){
?>	
<!-- Phần đầu -->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
       require('admin/views/common/head.php');
    ?>
     
</head> 
<body>
  <!-- khung -->
  <?php
       require('admin/views/common/frames.php');
  ?>
     
  <!-- hết phần khung -->

<?php
//require_once('admin_fr.php');
?>
<?php
	require_once('config/database.php');
	Database::connect();


	/**
	 * Require MasterModel
	 */
	require_once('admin/models/MasterModel.php');
  
  

  $urlink = isset($_GET['url'])? $_GET['url'] :NULL;
  $search_user = isset($_GET['search_user'])? $_GET['search_user'] :NULL;
  $search_news = isset($_GET['search_news'])? $_GET['search_news'] :NULL;
 
if($urlink!=NULL)
{
  $url = rtrim($urlink,'/');
  $url = explode("/", $url);
  $method=isset($url[1]) ? $url[1] : null;
  $param=isset($url[2]) ? $url[2] : null;
  if(preg_match_all('/\?s=(.*)/',$urlink,$matches))
  {
    
    $param=isset( $matches[1][0])? $matches[1][0]:null  ;
  }
   $param;

}

else
{
  unset($url);
}

// search user
if($search_user!=NULL)
{
  $GET = $_SERVER['PHP_SELF'];
  $URL = rtrim($GET, '/');
  $urls = explode('/', $URL);
  $method='search';
  $param=$search_user;
  $url[0]= 'member';
}
// search news
if($search_news!=NULL)
{
  $GET = $_SERVER['PHP_SELF'];
  $URL = rtrim($GET, '/');
  $urls = explode('/', $URL);
  $method='search';
  $param=$search_news;
  $url[0]= 'news';
}
  
 

if(isset($url[0]))
{
    if( file_exists('admin/controllers/'.$url[0].'.php') )
    {
      include_once('admin/controllers/'.$url[0].'.php');
      $className = ucfirst($url[0]).'Controller';
      
        $object= new $className;

      if(isset($param))
      {
        $object->$method($param);
      }
      else 
      {
        if(method_exists($className,$method))
        {
          $object->$method();
        }
        else
        {
          #code..
        }
      }
    }
}
else
{
        $url[0]='home';
        $method= 'index';
        include_once('admin/controllers/'.$url[0].'.php');
        $className = ucfirst($url[0]).'Controller';
        
          $object= new $className;

        if(isset($param))
        {
          $object->$method($param);
        }
        else 
        {
          if(isset($method))
          {
            $object->$method();
          }
          else
          {
            #code..
          }
        }
}
}
else{
  echo "<script>alert('Not Admin')</script>";
	echo "<script>window.location.href='/kit_club/index.php'</script>";
}