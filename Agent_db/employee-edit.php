<?php
session_start();
require 'dbcon.php'
    ?>


<?php include ('includes/header.php') ?>



<div class="container mt-5">

    <?php include ('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Employee Edit
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET['id'])) {
                        $employee_id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM employee WHERE sl_no='$employee_id' ";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $employee = mysqli_fetch_array($query_run);
                            ?>


                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="sl_no" value="<?= $employee['sl_no'] ?>">

                                <div class="mb-3">
                                    <label for="">Employee_id</label>
                                    <input type="text" name="employe_id" value="<?= $employee['employe_id']; ?>" class="form-control">
                                </div>

                        <div class="mb-3">
                            <label for="">Date</label>
                            <input type="date" name="date" value="<?= $employee['date']; ?>" class="form-control">
                        </div>

                            <div class="mb-3">
                                <label for="">Login Time</label>
                                <input type="time" name="login" value="<?php echo explode(".",$employee['login'])[0]; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Shop Name</label>
                                <input type="text" name="shop_name" value="<?= $employee['shop_name']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="agency_type">Agency Type:</label>
                                <select id="agency_type" name="agency_type" class="form-control" required>
                                    <option value="">Select Agency Type</option>
                                    <option value="silver" <?php if($employee['agency_type']=="silver") echo "selected"; ?>>silver</option>
                                    <option value="gold" <?php if($employee['agency_type']=="gold") echo "selected"; ?>>Gold</option>
                                    <option value="platinum" <?php if($employee['agency_type']=="platinum") echo "selected"; ?>>Platinum</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" value="<?= $employee['email']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Phone No</label>
                                <input type="text" name="phone" value="<?= $employee['phone']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Address</label>
                                <textarea name="address" class="form-control" col="8"><?= $employee['address']; ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Remarks</label>
                                <input type="text" name="remarks" value="<?= $employee['remarks']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Upload Image</label>
                                <input type="file" name="img" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Logout</label>
                                <input type="time" name="logout" value="<?php echo explode(".",$employee['logout'])[0]; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="update_employee" class="btn btn-primary">Save Details</button>
                            </div>
                            </form>

                            <?php
                        } else {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include ('includes/footer.php') ?>