<!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <title>Untitled Document</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        </head>

        <body>
        <?//php
        // 	 include('connection.php');

        //  $query = "select * from branch";
        //  $result = mysqli_query($con,$query);


        //?>

        <form  method="POST" enctype="multipart/form-data">
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
        <b>img :</b>
        <input class="form-control" type="file" placeholder="insret your phone !" name="img" required>
 
        </td>
        
        </tr>



         <tr>

         <label for="cars">Choose a car:</label>

<select name="branch" id="cars">
    <?php 
    
//   echo "<option value='$row[id]' >$row['bac_name']</option>";
  
  ?>
</select>


         </tr>
        <!-- <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Catogery</label>
                    <select name="cat" class="form-control">
                        <//?//php

                            //while($row = mysqli_fetch_array($result)){
                                
                                // echo "<option value='$row[id]' >$row[bac_name]</option>";


                            //}
                            //?>
                        
                    </select>
                    
                </div> -->

        </table>
        <br>
        <br>
        <center>
        <input type="submit" name="insert-btn" value="INSERT" class="btn btn-info">
        <a href="index_i.php" style="width:85px;" class="btn btn-danger">EXIT</a>  
        </center>

        </form>

        </body>
        </html>


        <?php 

        include('connection.php');



        //insert


        if(isset($_POST['insert-btn'])){

        $name = $_POST['std_name'];
        $f_name = $_POST['fat_name'];   
        $phone = $_POST['phone'];
        $address = $_POST['address'];
    

                $file_name =$_FILES['img']['name'];
                $tem =$_FILES['img']['tmp_name'];
                $folder   = "images/" .$file_name;


        mysqli_query($con,"INSERT INTO adm_entry (s_name, f_name, phone,address,img) VALUES ('".$name."', '".$f_name."', '".$phone."', '".$address."' , '".$folder."') ") or die("error 24".mysqli_error($con));


if(move_uploaded_file($tem,$folder)){
    echo "<script>alert('Your Record Inserted  img!');</script>";

    echo '<script>window.location="k.php"</script>';


}

else{

    echo "<script>alert('Your Record  Inserted not img!');</script>";


}

        echo "<script>alert('Your Record Inserted !');</script>";

        echo '<script>window.location="k.php"</script>';

        }  // insert end


        ?>