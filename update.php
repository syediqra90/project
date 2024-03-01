<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<?php 
 
	 include('connection.php');
	 
	 
	 
	 //insert
	 
		
		if(isset($_POST['update-btn'])){
		 
		  $id = $_POST['id'];
		  $name = $_POST['std_name'];
		  $f_name = $_POST['fat_name'];   
		  $phone = $_POST['phone'];
		  $address = $_POST['address'];
          $filename = $_FILES['img']['name'];
          $tempname = $_FILES['img']['tmp_name'];
             $folder  =  "images/".$filename;

 
     mysqli_query($con," UPDATE adm_entry SET
	 s_name = '".$name."',
	 f_name = '".$f_name."',
	 phone = '".$phone."',
	 address = '".$address."',
     img     = '".$folder ."'
	 WHERE id = '".$id."' ") or die("erro ".mysqli_error($con));
		  
     if(move_uploaded_file($tempname,$folder)){


        echo '<script>alert("your image uploaded");</script>';
        
        
                 }
                 else{
        
        
                    echo '<script>alert("your image not");</script>';
        
                 }
                  
		  
		  
		echo "<script>alert('Your Record Updated !');</script>";
		
		 echo '<script>window.location="index_i.php"</script>';
		 
		}  // insert end
	 
	 
?>
<body>


    
    <form enctype="multipart/form-data" action="update.php" method="POST" autocomplete="off">
    
    
    <?php 
    
	  $up_qry = mysqli_query($con,"select * from adm_entry where id = '".$_GET['up_id']."' ") or die("error 47".mysqli_error($con));
	  $up_data = mysqli_fetch_array($up_qry);
	  

  
	?>
    
       <table align="center">

       <tr>
    <td colspan="2">
       <img id="update-user-file" style=" margin:5%; width:300px; height:150px;" src="<?php echo $up_data["img"]; ?>">

    </td>
</tr>
             <tr>
                 <td>
                     <b>Student Name :</b> 
                 </td>
                 <td>


                 
                 <input type="hidden" name="id" value="<?php echo $up_data['id'];?>">
                 <!-- <input class="form-control" value="<?php echo $up_data['s_name'];?>" type="text" placeholder="insret your name !" name="std_name" required> -->
                 <input class="form-control" value="<?php echo $up_data['s_name'];?>" type="text" placeholder="insret your name !" name="std_name" required>

                
                </td>
             </tr>
             <br>
             <tr>
                 <td>
                     <b>Father Name :</b> 
                 </td>
                 <td>
                 <input class="form-control" value="<?php echo $up_data['f_name'];?>" type="text" placeholder="insret your father name !" name="fat_name" required>
                 </td>
             </tr>
             
             
             <tr>
                 <td>
                     <b>Phone :</b> 
                 </td>
                 <td>
                 <input class="form-control" value="<?php echo $up_data['phone'];?>" type="text" placeholder="insret your phone !" name="phone" required>
                 </td>
             </tr>
             
             
             <tr>
                 <td>
                     <b>Address :</b> 
                 </td>
                 <td>
                <textarea type="text"  class="form-control" name="address" rows=3><?php echo $up_data['address'];?></textarea>
                 </td>
             </tr>
             <tr>
             <td align="right">Customer Image:</td>
             <td><input type="file" name="img" value="<?php echo $up_data['img'];  ?>"  /></td>
        </tr>

            
             
       </table>
       <br>
       <br>
       <center>
             <input type="submit" name="update-btn" value="UPDATE" class="btn btn-info">
              <a href="index.php" style="width:85px;" class="btn btn-danger">EXIT</a>  
       </center>
       
    </form>

</body>
</html>