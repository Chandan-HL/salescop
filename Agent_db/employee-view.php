<?php
require 'dbcon.php'
?>

<?php include('includes/header.php') ?>


  <div class="container mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>View Employee Details 
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $employee_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM employee WHERE sl_no='$employee_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $employee = mysqli_fetch_array($query_run);
                                ?>

                                
                                    <div class="mb-3">
                                        <label for="">Employee_ID</label>
                                        <p class="form-control">
                                            <?=$employee['employe_id'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Date</label>
                                        <p class="form-control">
                                            <?=$employee['date'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Login</label>
                                        <p class="form-control">
                                        <?php echo explode(".",$employee['login'])[0]; ?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Shop Name</label>
                                        <p class="form-control">
                                            <?=$employee['shop_name'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Agency Type</label>
                                        <p class="form-control">
                                            <?=$employee['agency_type'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <p class="form-control">
                                            <?=$employee['email'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Phone</label>
                                        <p class="form-control">
                                            <?=$employee['phone'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Address</label>
                                        <p class="form-control">
                                            <?=$employee['address'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Remarks</label>
                                        <p class="form-control">
                                            <?=$employee['remarks'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Image</label>
                                        <p class="form-control">
                                           <img src="<?=$employee['image'];?>" alt="<?=$employee['employe_id']; ?>" class="img-rounded" width="250px" height="250px"> 
                                            
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Logout</label>
                                        <p class="form-control">
                                        <?php echo explode(".",$employee['logout'])[0]; ?>
                                        </p>
                                    </div>
            
                                <?php
                            }
                            else{
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
  </div>

 
  <?php include('includes/footer.php') ?>
