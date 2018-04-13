<?php
  session_start();
  require('function.php');
  $conn = dbcon();

  if (isset($_POST['reply'])) {

    $comment = mysqli_real_escape_string($conn, $_POST['cmntbox']);
    $userid = $_SESSION['user'];
    $postid = $_POST['postid'];
    $postdate = date("d-m-y");
    
    if( strpos($comment ,"bitch") >=1 || strpos($comment ,"dogy") >=1 || strpos($comment ,"busterd") >=1 || strpos($comment ,"ass") >=1 || strpos($comment ,"bloddyhell") >=1 || strpos($comment ,"dick") >=1 || strpos($comment ,"boolocks") >=1 || strpos($comment ,"eroticgalaxy") >=1|| strpos($comment ,"erotic") >=1 || strpos($comment ,"eroticgalaxy") >=1||strpos($comment ,"burt") >=1 || strpos($comment ,"bitch") >=1||strpos($comment ,"go to hell") >=1||strpos($comment ,"assole") >=1)
    {
       echo '<script> window.location.href="viewpost.php?ststus=wrong&&postid='.$postid.'";</script>';
       
    }
    else{
    
    if ($comment==null) {
      $location = "location:viewpost.php?postid={$postid}";
      header($location);
      exit();
    }
    else {
      $sql = "INSERT INTO comment (comment,postid,userid,cmntdate) VALUES ('$comment',$postid,$userid,'$postdate')";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        echo "Error while commenting";
      }
      else {
        // $location = "location:viewpost.php?postid={$postid}";
        header("location:viewpost.php?postid={$postid}");
      }
    }
  }
  }
?>
