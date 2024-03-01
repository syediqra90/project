<?php 

$con = mysqli_connect('localhost','root','','second_batch_back')
or die ("connection failed");

if(isset($_POST['update-btn'])){



    $id = $_POST['id'];
    $name = $_POST['std_name'];
    $f_name = $_POST['fat_name'];   
    $phone = $_POST['phone'];
    $address = $_POST['address'];
     
 


    $iq = mysqli_query($con,"UPDATE 
    `adm_entry` SET `s_name`='$name',
    `f_name`='$f_name',
    `phone`='$phone',
    `address`='$address'
     WHERE id = '$id' ") or die ("error".mysqli_error($con));





}




?>




<form action="update.php" method="POST" autocomplete="off">
    
    
<?php



$iqs =   mysqli_query($con, "select * from adm_entry where id = '".$_GET['id']."' ");

  $iq= mysqli_fetch_array($iqs);
?>




    
       <table align="center">
             <tr>
                 <td>
                     <b>Student Name :</b> 
                 </td>
                 <td>
                 <input type="hidden" name="id" value="<?php echo $iq['id'];?>">
                 <!-- <input class="form-control" value="<?php echo $iq['s_name'];?>" type="text" placeholder="insret your name !" name="std_name" required> -->
                 <input class="form-control" value="<?php echo $iq['s_name']?>" type="text" placeholder="insret your name !" name="std_name" required>

                
                </td>
             </tr>
             <br>
             <tr>
                 <td>
                     <b>Father Name :</b> 
                 </td>
                 <td>
                 <input class="form-control" value="<?php echo $iq['f_name'];?>" type="text" placeholder="insret your father name !" name="fat_name" required>
                 </td>
             </tr>
             
             
             <tr>
                 <td>
                     <b>Phone :</b> 
                 </td>
                 <td>
                 <input class="form-control" value="<?php echo $iq['phone'];?>" type="text" placeholder="insret your phone !" name="phone" required>
                 </td>
             </tr>
             
             
             <tr>
                 <td>
                     <b>Address :</b> 
                 </td>
                 <td>
                <textarea type="text"  class="form-control" name="address" rows=3><?php echo $iq['address'];?></textarea>
                 </td>
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