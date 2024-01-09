<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
     integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
  

<h2 class="text-center mt-3">Update Form</h2>

<a href="<?php echo base_url('student');?>" class="btn btn-info float-right mb-3">Back</a>


<form action="<?php echo base_url('student-update/'.$studentmodel['id'])?>"  method="post"
 enctype="multipart/form-data">
 <input type="hidden" name="_method" value="put">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" 
    value="<?php echo $studentmodel['name'];?>">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="email" 
    value="<?php echo $studentmodel['email'];?>">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="phone"
     value="<?php echo $studentmodel['phone'];?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file"  class="form-control" id="exampleInputPassword1" name="image" 
     value="<?php echo $studentmodel['image'];?>" required>
  </div>


  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>

</div>
    
</body>
</html>