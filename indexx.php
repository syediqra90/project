<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
     

  <?php  
  
   include("connection.php");
//    if(isset($_GET['delete'])){
//     mysqli_query($con,"DELETE FROM adm_entry WHERE id = '".$_GET['del_id']."' ")or die("error 26".mysqli_error($con));;
//     echo '<script>window.location="indexx.php"</script>';
   
// }


if(isset($_GET['delete'])){
	  
    //echo $_GET['del_id'];
    
    mysqli_query($con,"DELETE FROM adm_entry WHERE id = '".$_GET['del_id']."' ") or die("error 26".mysqli_error($con));
    
    echo '<script>window.location="indexx.php"</script>';
    
  }



  ?>
  
  <table class="table">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

    <?php 
 include("connection.php");

  $query = mysqli_query($con,"select * from `adm_entry`");

   while ($data = mysqli_fetch_array($query)){


?>

        <tr>

            <td><?php  echo $data['id']?></td>
            <td></td>
            <td><a href="indexx.php?delete&del_id<?php echo $data['id']?>" class="btn btn-danger"> d  </td>
        </tr>
   <?php }?>
    </tbody>
  </table>

  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>