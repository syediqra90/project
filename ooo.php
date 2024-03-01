<!-- <//?//php
    
    // $a = "welcome";
    // if(isset($a)){

    //     echo "bnsgh";

    // } else{


    //     echo "wrong";
    // }
 


// if(isset($_POST['name'])&&($_POST['email'])){

// echo $_POST['name'];
// echo $_POST['email'];
// }

    
    //?//> -->


<?php
if(isset($_GET['name'])&& ($_GET['email'])){

echo $_GET['name'];
echo $_GET['email'];

}

?>



<!DOCTYPE HTML>
<html>
    
<body>
<form action="ooo.php" method="get">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit" value="sumit">





 
</form>
</body>
</html>