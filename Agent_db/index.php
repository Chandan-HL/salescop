<?php
    session_start();
    require 'dbcon.php';
?>

<?php include('includes/header.php') ?>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Sales Details
                            <a href="employee.php" class="btn btn-primary float-end">Enter Fields</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Employee_ID</th>
                                    <th>Date</th>
                                    <th>Login Time</th>
                                    <th>Shop Name</th>
                                    <th>Agency Type</th>
                                    <th>Logout Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM employee";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $employee)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $employee['sl_no'];?></td>
                                                <td><?= $employee['employe_id'];?></td>
                                                <td><?= $employee['date']; ?></td>
                                                <td><?php echo explode(".",$employee['login'])[0]; ?></td>
                                                <td><?= $employee['shop_name']; ?></td>
                                                <td><?= $employee['agency_type']; ?></td>
                                                <td><?php echo explode(".",$employee['logout'])[0]; ?></td>
                                                <td>
                                                    <a href="employee-view.php?id=<?= $employee['sl_no']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="employee-edit.php?id=<?= $employee['sl_no']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_employee" value="<?=$employee['sl_no'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>


