<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
     integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
<div class="container mt-5">
  <h2 class="text-center mb-4">All student Data</h2>
  <!-- export button -->
  <a href="student/export-excel" class="btn btn-success">Export to Excel</a>
<!-- end -->

  <a href="<?php echo base_url('student-create');?>" class="btn btn-primary float-right mb-3">Add Student</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Image</th>

      <th scope="col">Action</th>
    </tr>
  </thead>

  <?php
 foreach($student as $row):
  ?>

<tbody>
 <tr>
 <td><?php echo $row['id'];?></td>
  <td><?php echo $row['name'];?></td>
  <td><?php echo $row['email'];?></td>
  <td><?php echo $row['phone'];?></td>
  <td><img src="<?php echo 'public/upload/'. $row['image'];?>" alt="" height="100" width="100"></td>
  <td>
    <a href="<?php echo base_url('student-edit/'.$row['id']);?>" class="btn btn-primary"> Edit</a>
    <a href="<?php echo base_url('student-delete/'.$row['id']);?>" class="btn btn-danger"> Delete</a>
  </td>

 </tr>

 
  </tbody>
  
<?php  endforeach; ?>
</table>
</div>




<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
  $(document).ready(function()
  {
    <?php  
    if(session()->getFlashdata('status'))
    {
?>
swal({
  title:"<?php echo session()->getFlashdata('status');?>",
  icon:"<?php echo session()->getFlashdata('status_icon');?>",
  button:"Done!",

});
<?php
    }?>

  });
</script>

</body>
</html>