<!-- start of header -->
<?php 
include('./maininclude/header.php');
?>
<!-- end of footer -->
 <!-- image -->
 <div class="container-fluid bg-dark">
 <div class="row">
 <img src="./image/Writing-and-Outlining.jpg" alt="courses" style="height:500px; width:100%;object-fit:cover;box-shadow:10px;"/>
 </div>
 </div>
 <!-- end image -->

<!-- start main content -->
<div class="container">
<h2 class="text-center my-4">Payment Status</h2>
<form method="post" action="">
<div class="form-group row">
<label class="offset-sm-3 col-form-label">Order Id: </label>
<div>
<input type="text" class="form-control mx-3">
</div>
<div>
<input type="submit" class="btn btn-primary mx-4" value="View">
</div>
</div>
</form>
</div>
<!--end of main content -->

<!-- start contact -->
<?php
include('./contact.php');
?>
<!-- end contact -->

<!-- start of footer -->
<?php
include('./maininclude/footer.php');
?>
<!-- end of footer -->