<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Africa/Nairobi');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $password = $_POST['password'];
    $shippingAddress = $_POST['shippingAddress'];
    $shippingState = $_POST['shippingState'];
    $shippingCity = $_POST['shippingCity'];
    $shippingPincode = $_POST['shippingPincode'];
    $billingAddress = $_POST['billingAddress'];
    $billingState = $_POST['billingState'];
    $billingCity = $_POST['billingCity'];
    $billingPincode = $_POST['billingPincode'];

    $id = intval($_GET['id']);

    $sql = mysqli_query($conn, "UPDATE users SET name='$name', email='$email', contactno='$contactno', password='$password', shippingAddress='$shippingAddress', shippingState='$shippingState', shippingCity='$shippingCity', shippingPincode='$shippingPincode', billingAddress='$billingAddress', billingState='$billingState', billingCity='$billingCity', billingPincode='$billingPincode' WHERE id='$id'");

    $_SESSION['msg'] = "User Updated";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| User</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
</head>

<body>
    <?php include('include/header.php');?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include('include/sidebar.php');?>
                <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>User</h3>
                            </div>
                            <div class="module-body">

                                <?php if(isset($_POST['submit']))
{?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>

                                    <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                </div>
                                <?php } ?>


                                <br />

                                <form class="form-horizontal row-fluid" name="User" method="post">
                                    <?php
    $id=intval($_GET['id']);
    $query=mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
    while($row=mysqli_fetch_array($query))
    {
    ?>
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Name</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Enter Name" name="name"
                                                value="<?php echo  htmlentities($row['name']);?>" class="span8 tip"
                                                required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Email</label>
                                        <div class="controls">
                                            <input type="email" placeholder="Enter Email" name="email"
                                                value="<?php echo  htmlentities($row['email']);?>" class="span8 tip"
                                                required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Contact Number</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Enter Contact Number" name="contactno"
                                                value="<?php echo  htmlentities($row['contactno']);?>" class="span8 tip"
                                                required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Password</label>
                                        <div class="controls">
                                            <input type="password" placeholder="Enter Password" name="password"
                                                value="<?php echo  htmlentities($row['password']);?>" class="span8 tip"
                                                required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Shipping Address</label>
                                        <div class="controls">
                                            <textarea class="span8" name="shippingAddress"
                                                rows="5"><?php echo  htmlentities($row['shippingAddress']);?></textarea>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Shipping State</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Enter Shipping State" name="shippingState"
                                                value="<?php echo  htmlentities($row['shippingState']);?>"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Shipping City</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Enter Shipping City" name="shippingCity"
                                                value="<?php echo  htmlentities($row['shippingCity']);?>"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Shipping Pincode</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Enter Shipping Pincode"
                                                name="shippingPincode"
                                                value="<?php echo  htmlentities($row['shippingPincode']);?>"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Billing Address</label>
                                        <div class="controls">
                                            <textarea class="span8" name="billingAddress"
                                                rows="5"><?php echo  htmlentities($row['billingAddress']);?></textarea>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Billing State</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Enter Billing State" name="billingState"
                                                value="<?php echo  htmlentities($row['billingState']);?>"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Billing City</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Enter Billing City" name="billingCity"
                                                value="<?php echo  htmlentities($row['billingCity']);?>"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Billing Pincode</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Enter Billing Pincode" name="billingPincode"
                                                value="<?php echo  htmlentities($row['billingPincode']);?>"
                                                class="span8 tip" required>
                                        </div>
                                    </div>

                                    <?php } ?>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>






                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->

    <?php include('include/footer.php');?>

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    });
    </script>
</body>
<?php } ?>