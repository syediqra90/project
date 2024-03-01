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


if(isset($_GET['del'])){

  $del =  mysqli_query($con,"DELETE FROM `adm_entry` where  id  = '".$_GET['delete_id']."' ");
 echo '<script>window.location="index_i.php" </script>';


   


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
 


      $sqlq = mysqli_query($con,"select * from adm_entry order by id DESC")or die ("error".mysqli_error($con));
      while( $iq = mysqli_fetch_array($sqlq)){


?>











		
             <tr>
                 <td> <?php  echo  $iq['id'] ?></td>
                 <td> <?php  echo  $iq['s_name'] ?></td>
                 <td> <?php  echo  $iq['f_name'] ?></td>
                 <td> <?php  echo  $iq['phone'] ?></td>
                 <td> <?php  echo  $iq['address'] ?></td>


                 <td><img src="<?php echo $iq["img"] ?>" width="150px" height="150px" /></td>


<td>  
     
<a onclick="return confirm('Are You Sure You Want To Detele');"  href="index_i.php?del&delete_id=<?php  echo  $iq['id'] ?>" class="btn btn-primary" >   D  </a>
<a  href="update.php?Update&up_id=<?php  echo  $iq['id'] ?>" class="btn btn-primary" >   U  </a>

</td>

     









             </tr>



  <?php }?>









              <!-- // loop close  -->

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