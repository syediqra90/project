
<?php


  $con = mysqli_connect('localhost','root','','second_batch_back')
  or die ("connection failed");




  if(isset($_post['insert-btn'])){

          $name =$_post['std_name'];
          $f_name =$_post['fat_name'];
          $p_phone =$_post['phone'];
          $addres =$_post['address'];
          $date =$_post['date'];



mysqli_query($con," INSERT INTO `adm_entry`(`id`, `s_name`, `f_name`, `phone`, `address`, `date`) 
VALUES ('".$name."','".$f_name."','".$p_phone."','".$addres."','".$date."')");

echo "<script> alert('you error ')  </script>";

echo '<script>"window.location"coni.php"<script>';


  }



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<form action="insert.php" method="POST" autocomplete="off">
       <table align="center">
             <tr>
                 <td>
                     <b>Student Name :</b> 
                 </td>
                 <td>
                 <input class="form-control" type="text" placeholder="insret your name !" name="std_name" required>
                 </td>
             </tr>
             <br>
             <tr>
                 <td>
                     <b>Father Name :</b> 
                 </td>
                 <td>
                 <input class="form-control" type="text" placeholder="insret your father name !" name="fat_name" required>
                 </td>
             </tr>
             
             
             <tr>
                 <td>
                     <b>Phone :</b> 
                 </td>
                 <td>
                 <input class="form-control" type="text" placeholder="insret your phone !" name="phone" required>
                 </td>
             </tr>
             
             
             <tr>
                 <td>
                     <b>Address :</b> 
                 </td>
                 <td>
                <textarea type="text" class="form-control" name="address" rows=3></textarea>
                 </td>
             </tr>


             <tr>
                 <td>
                     <b>date :</b> 
                 </td>
                 <td>
                <textarea type="date" class="form-control" name="date" rows=3></textarea>
                 </td>
             </tr>
             
       </table>
       <br>
       <br>
       <center>
             <input type="submit" name="insert-btn" value="INSERT" class="btn btn-info">
              <a href="index.php" style="width:85px;" class="btn btn-danger">EXIT</a>  
       </center>
       
    </form>
  
    
</body>
</html>