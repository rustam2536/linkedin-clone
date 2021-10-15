 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login form</h2>
  <?php 
   echo form_open_multipart('admin/sign-in',array('class' => 'form-horizontal','id' => 'slider_form'));
   ?>   
    <?php 
      if($this->session->flashdata('error') !='')
      {
        ?>
        <div class=" bg-danger text-white" >
            <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php
        
      }
      if($this->session->flashdata('success') !='')
      {
        ?>
        <div class=" bg-success text-white" >
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php
        
      }
    ?>
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    <input type="submit" name="submit" value="save" class="btn btn-primary mt-2">   
  <?php echo form_close(); ?>

  
</div>

</body>
</html>
