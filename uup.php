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
$con = mysqli_connect('localhost','root','','second_batch_back')
or die ("connection failed");
?>
<?php
if(isset($_GET['update'])){

?>
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
<?php } else if(isset($_GET['update'])) { ?>

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
                                <a href="uup.php" class="btn btn-primary submit-btn">LIST</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
<?php }else { ?>

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



        <?php

//insert
if(isset($_POST['insert'])){

   mysqli_query($con,"INSERT INTO `branch` (`bac_name`) VALUES ('".$_POST['bac_name']."')" ) or die("error 434".mysqli_error($con));

    echo "<script>window.location='uup.php';</script>";

}



if(isset($_POST['update'])){

    mysqli_query($con,"update `branch` set `bac_name` = '".$_POST['bac_name']."'   where id = '".$_POST['id']."' " ) or die("error 316".mysqli_error($con));

    echo "<script>window.location='uup.php';</script>"; 
 }
 


?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>