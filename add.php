<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Phone Book</title>
  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <?php
 
 $flag=2;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $servername="localhost";
    $username   = "root";
        $password   = "pass";
        $dbname     = "phone";
        $con = new mysqli($servername, $username, $password, $dbname);
if(!$con)
{
  echo "Connection failed";
}
else
{
    // echo "Connection successfully<br>";
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phoneno=$_POST['phoneno'];
    $dob=$_POST['dob'];
 

    $query="insert into phone(name, email, phoneno, dob) values ('$name','$email','$phoneno','$dob')";

    $sqlemail = "SELECT * FROM phone WHERE phoneno='$phoneno'";
 
    $resemail = mysqli_query($con, $sqlemail);

    if(mysqli_num_rows($resemail) > 0)
    {
        $flag=0;
    }
    else
    {
    $putdata=mysqli_query($con, $query) or die(mysqli_error($con));
    $flag=1;
    }

    mysqli_close($con);
}
}
?>


<nav class="navbar navbar-light sticky-top" style="background-color: #000;">
  <a style="color:#fff" class="navbar-brand" href="#">
  PhoneBook</a>
</nav>


<br><br>

<div class="container" style="border: 1px solid black; height: 1000px;">


  <div class="col-md-10 offset-md-1 text-xs-center">
             
  <div class="card text-center">
  <div class="card-header">
    Add Contact
  </div>
  <br>
  <div class="card-body">


       <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

           <?php

if($flag==1)
echo '<div class="alert alert-success" role="alert">Contact Added Successfully</div><br>';
if($flag==0)
echo '<div class="alert alert-danger" role="alert">Sorry Phone number already exit, enter different Phone number</div><br>';

?>
      
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">DOB</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputEmail3" placeholder="Date of Birth" name="dob">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Phone Number" name="phoneno" required minlength="10" maxlength="15">
    </div>
  </div>

   <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
    </div>
  </div>

  
  <div class="form-group row">
    <div class="col-sm-12">
      <a href="edit.php"><button type="button" class="btn btn-danger">

    Back</button></a>

      <button type="submit" class="btn btn-danger">

    Save</button>

    </div>
  </div>


  

</form>

</div>
</div>
</div>


</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>