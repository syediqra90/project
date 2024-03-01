<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<?php
	 
	 
	 // host = localhost
	 // user = root
	 // pass = 
	 //  databasenmae = ??
	 
	 include('connection.php');
  
  
  
  if(isset($_GET['delete'])){
	  
	    //echo $_GET['del_id'];
		
		mysqli_query($con,"DELETE FROM adm_entry WHERE id = '".$_GET['del_id']."' ") or die("error 26".mysqli_error($con));
		
		echo '<script>window.location="index.php"</script>';
		
	  }

   

?>


</head>

<body>




<br>
<br>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>

    <center>
    
    <a class="btn btn-primary" href="insert.php">ADD</a>
    
    <br><br>
    
     <input type="search" id="sch" onKeyUp="myfc()" placeholder="Search Here !" class="form-control">
  

    <table class="table">
        <thead align="center">
             <tr>
               <th>ID#</th>
               <th>Student Name</th>
               <th>Father Name</th>
               <th>Phone No</th>
               <th>Address</th>
               <th>Action</th>
             </tr>
        </thead>
        <tbody align="center" id="myTable">
         <?php

$qry  =   mysqli_query  ($con,"SELECT * FROM `adm_entry`") or die("error 75".mysqli_error($con));


// $qry = mysqli_query($con,"SELECT * FROM adm_entry") or die("error in 20".mysqli_error($con)); 

		  $sno = 0;
		  while($data = mysqli_fetch_array($qry)){
			  $sno++;
			  ?>
             <tr>
                 <td><?php echo $data['id'];         ?></td>
                 <td><?php echo $data['s_name']; ?></td>
                 <td><?php echo $data['f_name']; ?></td>
                 <td><?php echo $data['phone']; ?></td>
                 <td><?php echo $data['address']; ?></td>
                 <td>
<a onClick="return confirm('Are you sure you want to delete this record !');" href="index.php?delete&del_id=<?php echo $data['id'];?>" class="btn btn-danger">D</a>                    
 <a href="update.php?update&up_id=<?php echo  $data['id'];?>" class="btn btn-info">U</a>


 <!-- <a href="update2.php"?iq&up_id=<?php echo $data['id']?>"class="btn btn-info">U</a> -->
                     
                 </td>
             </tr>
          <?php } // loop close ?>
        </tbody>
    </table>






</body>


<script>
function myfc() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sch");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>


</html>