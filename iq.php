<!DOCTYPE html>
<html lang="en">
<?php

$con = mysqli_connect('localhost','root','','second_batch_back')
  or die ("connection failed");
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">
    <title><?php echo $c_data['title']?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
    <div class="main-wrapper">

      
        <div class="page-wrapper">

<?php if(isset($_GET['update'])){ //Update ?>

<div>
            <br><br><br>
            <div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Branch</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        

                            <form method="POST" action="iq.php">
                            <?php 
                               $sel = mysqli_query($con, "select * from `branch` where id = '".$_GET['id']."' ") or die(connect_error($con)."sa");
                                $up = mysqli_fetch_array($sel);
                            ?>
                            <div class="row">
                               <input name="id" value="<?php echo $up['id'];?>" hidden>
                            

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Branch Name <span class="text-danger">*</span></label>
                                        <input name="bac_name" value="<?php echo $up['bac_name'];?>" class="form-control" type="text">
                                    </div>
                                </div>
                                
                                       
                               
                            </div>
                            <div class="m-t-20 text-center">
                                <button name="update" class="btn btn-primary submit-btn">ADD</button>
                                <a href="iq.php" class="btn btn-primary submit-btn">LIST</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

 <?php }else if(isset($_GET['insert'])){ //ADD ?> 


       
        
        <div>
            <br><br><br>
            <div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Branch</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="POST" action="iq.php">
                            <div class="row">
                               
                            <div class="col-sm-6">
                                    
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Branch Name <span class="text-danger">*</span></label>
                                        <input name="bac_name" class="form-control" type="text">
                                    </div>
                                </div>
                                
                                       
                               
                            </div>
                            <div class="m-t-20 text-center">
                                <button name="insert" class="btn btn-primary submit-btn">ADD</button>
                                <a href="iq.php" class="btn btn-primary submit-btn">LIST</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    

 <?php }else{ //list ?>
 
            <div class="content">               
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Branch</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="iq.php?insert" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Branch</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
                                        <th>Sno#</th>
										<th>Branch Name</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
                                    <?php
                                    $sno = 0; 
                               $sel = mysqli_query($con, "select * from `branch` order by id DESC ");
                                while($row = mysqli_fetch_array($sel)){$sno++;
                            ?>
            <tr>
                                        <td><?php echo $sno;?></td>
                                        <td><?php echo $row['bac_name'];?></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <!-- <div class="dropdown-menu dropdown-menu-right"> -->
                                                    <a class="dropdown-item" href="iq.php?update&id=<?php echo $row['id'];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a onclick="return confirm('Are you sure want to delete this Branch?');" class="dropdown-item" href="iq.php?delete&id=<?php echo $row['id'];?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                <!-- </div> -->
                                            </div>
                                        </td>
                                    </tr> 
                                    <?php } ?>                       
                                </tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
           
        </div>

<?php } //list ?>



    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>





<?php

//insert
if(isset($_POST['insert'])){

   mysqli_query($con,"INSERT INTO `branch` (`bac_name`) VALUES ('".$_POST['bac_name']."')" ) or die("error 434".mysqli_error($con));

    echo "<script>window.location='iq.php';</script>";

}

//update
if(isset($_POST['update'])){

   mysqli_query($con,"UPDATE `branch` SET 
   `bac_name` = '".$_POST['bac_name']."'
    where id = '".$_POST['id']."' " ) or die("error 316".mysqli_error($con));

   echo "<script>window.location='iq.php';</script>";
}


//delete
if(isset($_GET['delete'])){
   mysqli_query($con,"delete from `branch` where id = '".$_GET['id']."' ");
   echo "<script>window.location='iq.php';</script>";
}

?>


<!-- Branch23:19-->
</html>