<?php 
include('./admininclude/header.php');
include('../dbConnection.php');
?>

<div class="col-sm-9 mt-5">
   <!-- table -->
   <p class="bg-dark text-white p-2">List Of Students</p>
   <?php
   $sql="SELECT * FROM student";
   $result=$conn->query($sql);
   if($result->num_rows>0)
   {
   ?>
   <table class="table">
      <thead>
         <tr>
            <th scope="col">Student ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
         </tr>
</thead>
<tbody>
  <?php while($row=$result->fetch_assoc()){ 
           echo  '<tr>';
            echo '<th scope="row">'.$row['stu_id'].'</th>';
            echo '<td>'.$row['stu_name'].'</td>';
            echo '<td>'.$row['stu_email'].'</td>';
            echo'<td>';
              echo '
              <form action="editstudent.php" method="POST" class="d-inline">
              <input type="hidden" name="id" value='.$row["stu_id"].'>
              <button
               type="submit"
               class="btn btn-info mr-3"
               name="view"
               value="View"
               >
               <i class="fas fa-pen">
               </i>
               </button>
               </form>
               <form action="" method="POST" class="d-inline">
               <input type="hidden" name="id" value='.$row["stu_id"].'>
               <button
               type="submit"
               class="btn btn-secondary"
               name="delete"
               value="Delete"
               >
               <i class="fas fa-trash-alt">
               </i>
               </button>
               </form>
            </td>
         </tr>';
          } ?>
</tbody>
</table>
<?php } 
else
{
   echo '0 Result';
}

if(isset($_REQUEST['delete']))
{
   $sql="DELETE FROM student WHERE stu_id ={$_REQUEST['id']}";
   if($conn->query($sql)==TRUE)
   {
      echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';

   }
   else
   {
      echo 'unable to delete data';
   }
}





?>
</div>
</div>






<div>
   <a href="./addnewstudent.php" class="btn btn-danger box">
      <i class="fas fa-plus fa-2x"></i>
   </a>
</div>
</div>





 <?php
    include('./admininclude/footer.php');
   ?>