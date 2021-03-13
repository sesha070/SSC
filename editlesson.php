<?php 
include('./admininclude/header.php');
include('../dbConnection.php');

//Update
if(isset($_REQUEST['requpdate']))
{
   if(($_REQUEST['lesson_id']=="") || ($_REQUEST['lesson_desc']=="") || ($_REQUEST['course_id']=="")
    || ($_REQUEST['lesson_name']==""))
    {
        $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }
    else
    {
       $lid=$_REQUEST['lesson_id'];
       $lname=$_REQUEST['lesson_name'];
        $ldesc=$_REQUEST['lesson_desc'];
        $cid=$_REQUEST['course_id'];
        $sql="UPDATE lesson SET course_id='$cid',lesson_name='$lname',lesson_desc='$ldesc',lesson_id='$lid' WHERE lesson_id='$lid'";
        if($conn->query($sql)== TRUE)
        {
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Updated Successfully</div>';
        }
        else
        {
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update Course</div>';
        }
        
    }

}

?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Lessons Details</h3>

   <?php
   if(isset($_REQUEST['view']))
   {
      $sql="SELECT * FROM lesson WHERE lesson_id={$_REQUEST['id']}";
      $result=$conn->query($sql);
      $row=$result->fetch_assoc();
   }

   ?>


    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
    
        <label for="lesson_id">Lesson ID</label>
        <input type="text" class="form-control" id="lesson_id" name="lesson_id"
        value="<?php if(isset($row['lesson_id']))
        {
           echo $row['lesson_id'];
        }
           
           ?>" readonly>
    </div>
    <div class="form-group">

        <label for="lesson_name">Lesson Name</label>
        <input type="text" class="form-control" id="lesson_name" name="lesson_name"
        value="<?php if(isset($row['lesson_name']))
        {
           echo $row['lesson_name'];
        }
           
           ?>">
    </div>
    <div class="form-group">
        <label for="lesson_desc">Lesson Description</label>
        <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2><?php if(isset($row['lesson_desc']))
        {
           echo $row['lesson_desc'];
        }
           
           ?></textarea>
    </div>
    <div class="form-group">
        <label for="course_id">Course ID</label>
        <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id']))
        {
           echo $row['course_id'];
        }
           
           ?>" readonly>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
        <a href="courses.php" class="btn btn-secondary">Close</a>
</div>
<?php 
if(isset($msg))
{
    echo $msg;
}
?>
</form>
</div>
</div>
</div>


 <?php
    include('./admininclude/footer.php');
   ?>