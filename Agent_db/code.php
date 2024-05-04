<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_employee']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['delete_employee']);
    $query = mysqli_query($con,"select * from employee where sl_no='$employee_id'");

    $employee = mysqli_fetch_array($query);
    unlink($employee['image']);
    $query = "DELETE FROM employee WHERE sl_no='$employee_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}


if(isset($_POST['update_employee']))
{
    $sl_no = mysqli_real_escape_string($con, $_POST['sl_no']);
    $employe_id = mysqli_real_escape_string($con, $_POST['employe_id']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $login = mysqli_real_escape_string($con, $_POST['login']);
    $shop_name = mysqli_real_escape_string($con, $_POST['shop_name']);
    $agency_type = mysqli_real_escape_string($con, $_POST['agency_type']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $remarks = mysqli_real_escape_string($con, $_POST['remarks']);
    $logout = mysqli_real_escape_string($con, $_POST['logout']);

    $query = "";
    
    if(!empty($_FILES['img']['name'])){
        $filepath = $_FILES['img']['name'];
        $fileTmpPath = $_FILES['img']['tmp_name'];
        $destination = "uploads/" . $filepath; // Assuming "uploads/" is the directory where you store images
        
        // Delete old image if it exists
        $query_select = mysqli_query($con, "SELECT image FROM employee WHERE sl_no='$sl_no'");
        $old_image = mysqli_fetch_assoc($query_select);
        if(!empty($old_image['image'])){
            unlink($old_image['image']);
        }
        
        if(move_uploaded_file($fileTmpPath, $destination)){
            $query = "UPDATE employee SET employe_id='$employe_id', date='$date', login='$login', shop_name='$shop_name', agency_type='$agency_type', email='$email', phone='$phone', address='$address', remarks='$remarks', image='$destination', logout='$logout' WHERE sl_no='$sl_no' ";
        } else {
            $_SESSION['message'] = "Error uploading image";
            header("Location: index.php");
            exit(0);
        }
    } else {
        $query = "UPDATE employee SET employe_id='$employe_id', date='$date', login='$login', shop_name='$shop_name', agency_type='$agency_type', email='$email', phone='$phone', address='$address', remarks='$remarks', logout='$logout' WHERE sl_no='$sl_no' ";
    }
    
    if(!empty($query)){
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            $_SESSION['message'] = "Employee Updated Successfully";
            header("Location: index.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Employee Not Updated";
            header("Location: index.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Error processing form";
        header("Location: index.php");
        exit(0);
    }
}


if(isset($_POST['save_employee']))
{
    $uploadDirectory = 'uploads/';
    $employe_id = mysqli_real_escape_string($con, $_POST['employe_id']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $login = mysqli_real_escape_string($con, $_POST['login']);
    $shop_name = mysqli_real_escape_string($con, $_POST['shop_name']);
    $agency_type = mysqli_real_escape_string($con, $_POST['agency_type']);
    $email= mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $remarks = mysqli_real_escape_string($con, $_POST['remarks']);
    $fileTmpPath = $_FILES['img']['tmp_name'];
    $filepath =  $_FILES['img']['name'];
    $destination = $uploadDirectory . $filepath;
    $logout = mysqli_real_escape_string($con, $_POST['logout']);
    if (move_uploaded_file($fileTmpPath, $destination)) {
       
        $imageAddress = $destination;
    $query = "INSERT INTO employee (employe_id,date,login,shop_name,agency_type,email,phone,address,remarks,image,logout) 
    VALUES ('$employe_id','$date','$login','$shop_name','$agency_type','$email','$phone','$address','$remarks','$destination','$logout')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Employee Created Successfully";
        header("Location: employee.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Created";
        header("Location: employee.php");
        exit(0);
    }
}
}

?>