<?php 
include('./dbConnection.php');
include('./maininclude/header.php');
?>
<!-- end navigation -->

<!-- start video background -->
<div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
        <video playsinline autoplay muted loop>
        <source src="video/preview.mp4">
         </video>
         <div class="vid-overlay"></div>
     </div>
     <div class="vid-content">
        <h1 class="my-content">  Welcome to SSC </h1>
        <small class="my-content" >Be Perfect</small><br>
        <?php 
        if(!isset($_SESSION['is_login'])){
            echo '<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#stuRegModalCenter">Get Started</a>';
        }
        else
        {
            echo '<a href="./Student/studentProfile.php" class="btn btn-primary mt-3">My Profile</a>';
        }
        ?>


</div>
</div>

<!-- end video background -->
<!-- start text banner -->
<div class="container-fluid bg-danger txt-banner">
    <div class="row bottom-banner">
        <div class="col-sm">
            <h5><i class="fas fa-book-open mr-3"></i>100+ Online Courses</h5>
</div>
<div class="col-sm">
            <h5><i class="fas fa-book-users mr-3"></i>Expert Instructions</h5>
</div>
<div class="col-sm">
            <h5><i class="fas fa-keyboard mr-3"></i>Lifetime Access</h5>
</div>
<div class="col-sm">
            <h5><i class="fas fa-rupee-sign mr-3"></i>Money Back Guarantee*</h5>
</div>
</div>
</div>
<!-- end text banner -->

<!-- most popular courses -->
<div class="container mt-5">
    <h1 class="text-center">Popular Courses</h1>
    
<!-- start most popular 2st card deck -->
<div class="card-deck mt-4">
<?php
$sql="SELECT * FROM course LIMIT 3";
$result=$conn->query($sql);
if($result->num_rows> 0){
while($row=$result->fetch_assoc())
{
    $course_id=$row['course_id'];
    echo '
    <a href="#" class="btn" style="text-align: left; padding:0px ; margin:0px;">
        <div class="card">
            <img src="' . str_replace('..','.',$row['course_img']). '" class="card-img-top" alt="Guitar" style="height:100px; width:100px;"/>
            <iframe width="500" height="200" src="'.$row['demo_link'].'" align="right">
                </iframe>
            <div class="card-body">
                <h5 class="card-title">' .$row['course_name']. '</h5>
                <p class="card-text">' .$row['course_desc']. '</p>
             </div>
            <div class="card-footer">
                <p class="card-text d-inline">Price : <small><del>&#8377 ' .$row['course_original_price']. '</del></small>
                <span class="font-weight-bolder">&#8377 ' .$row['course_price']. '</span></p><a class="btn btn-primary text-white font-weight-bolder float-right"
                href="coursedetail.php?course_id='.$course_id.'">Enroll</a>
</div>
</div>
</a>
    ';
}

}
?>
       
<!-- end most popular 2st deck -->
<!-- start most popular 3rd card deck -->

<div class="text-center m-2">
    <a class="btn btn-danger btn-sm" href="courses.php">View all courses</a>
</div>
</div>

<!-- end most popular course -->
<!-- start contact us -->
<?php 
include('./contact.php');
?>
<!-- end contact us -->
<!-- footer section -->
<?php
include('./maininclude/footer.php');
?>
<!-- end of footer section -->
<!-- start student registration -->
<!-- Button trigger modal -->

