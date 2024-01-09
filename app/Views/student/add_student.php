<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
     integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <?php if(isset($validation)):?>
        <div class="alert alert-danger">
            <strong><?php echo $validation->listErrors()?></strong>
        </div>
        <?php endif; ?>

<h2 class="text-center mt-3">Add Form</h2>

<a href="<?php echo base_url('student');?>" class="btn btn-info float-right mb-3">Back</a>


<form action="<?php echo base_url('add-student')?>"  method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" 
    value="<?php echo set_value('name');?>">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="email" value="<?php echo set_value('email');?>">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="<?php echo set_value('phone');?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file"  class="form-control" id="exampleInputPassword1" name="image">
  </div>
 

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

</div>
    
</body>
</html>