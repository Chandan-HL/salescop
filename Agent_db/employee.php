<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Employees</title>
</head>

<body>


    <div class="container mt-5">

        <?php include ('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sales COP
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">


                        <div class="mb-3">
                            <label for="">Employee_id</label>
                            <input type="text" name="employe_id" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Date</label>
                            <input type="date" name="date" class="form-control">
                        </div>

                            <div class="mb-3">
                                <label for="">Login Time</label>
                                <input type="time" name="login" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Shop Name</label>
                                <input type="text" name="shop_name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="agency_type">Agency Type:</label>
                                <select id="agency_type" name="agency_type" class="form-control" required>
                                    <option value="">Select Agency Type</option>
                                    <option value="silver">silver</option>
                                    <option value="gold">Gold</option>
                                    <option value="platinum">Platinum</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="">Email</label> 
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Phone No</label>
                                <input type="text" name="phone" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Address</label>
                                <textarea name="address" class="form-control" col="8"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Remarks</label>
                                <input type="text" name="remarks" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Upload Image</label>
                                <input type="file" name="img" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Logout</label>
                                <input type="time" name="logout" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_employee" class="btn btn-primary">Save Details</button>
                            </div>

                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


</body>

</html>