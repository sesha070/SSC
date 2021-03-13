<?php
if(!isset($_SESSION))
{
    session_start();
}
include('../dbConnection.php');
if(isset($_SESSION['is_login']))
{
    $stuEmail=$_SESSION['stuLogEmail'];
}
else
{
    echo "<script> location.href='../index.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Course</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- awesome font -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
    
    <div class="container-fluid bg-success p-2">
    <h3>Welcome to SSC</h3>
    <a class="btn btn-danger" href="./myCourse.php">My Courses</a>
    </div>
    <div class="container-fluid">
    <div class="row">
    <div class="col-sm-3 border-right">
    <h4 class="text-center">Lessons</h4>
    <ul id="playlist" class="nav flex-column">
    <?php
    if(isset($_GET['course_id']))
    {
        $course_id=$_GET['course_id'];
        $sql="SELECT * FROM lesson WHERE course_id='$course_id'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
                echo '<li class="nav-item border-bottom py-2"
                movieurl='.$row['lesson_link'].' style="cursor:
                pointer;">'.$row['lesson_name'].'</li>';
            }
        }
    }
?>
</ul>
</div>
<div class="col-sm-8">
<button onclick="playVideo()"> 
        Play Video 
    </button> 
      
    <button onclick="pauseVideo()"> 
        Pause Video 
    </button>
    <br/>
<!-- <video id="videoarea" src="" class="mt-5 w-75 ml-2" 
controls>
<source src= "movieurl" type="video/mp4">
<p></p> 
</video> -->
    <br> 
      
    <video id="sample_video" width="1000" height="1240"> 
      
        <source src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20200107020629/sample_video.mp4" type="video/mp4"> 
    </video> 
      
    <script> 
        function playVideo() { 
            $('#sample_video').trigger('play'); 
        } 
        function pauseVideo() { 
            $('#sample_video').trigger('pause'); 
        } 
    </script>  
</div>
</div>
</div>

<?php
    include('./stuInclude/footer.php');
    ?>
