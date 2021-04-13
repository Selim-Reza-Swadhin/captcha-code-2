<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'captcha_code');
//print_r($_POST);

//$captcha = $_SESSION['CODE'];
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $details = $_POST['details'];
    $captcha = $_POST['captcha'];

    $sessionCaptcha = $_SESSION['captcha'];
    $formCaptcha = $_POST['captcha'];
    if ($sessionCaptcha == $formCaptcha){
        echo "<script>alert('Are you sure!');</script>";
        mysqli_query($conn, "INSERT INTO captchcode(name , mobile, details) VALUES ('$name', '$mobile', '$details')");
        echo "<h5 style='text-align: center; color: greenyellow'>You are successful.</h5>";
    }else {
        echo "<h3 style='text-align: center; color: crimson'>Invalid captcha code</h3>";
    }
}else{
    echo "<h3 style='text-align: center; color: red'>Please enter valid captcha code</h3>";
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Captcha Form</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <h1>Captcha Form</h1> <br>

            <form id="frmCaptcha" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="">Mobile</label>
                    <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile">
                </div>
                <div class="form-group">
                    <label for="">Details</label>
                    <textarea name="details" class="form-control" id="details" placeholder="Enter details"></textarea>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-9">
                            <label for="">Enter Captcha Code </label>
                            <input type="text" name="captcha" class="form-control" id="captcha"
                                   placeholder="Enter captcha code here...">
                        </div>
                        <div class="col-lg-3 text-center">
                            <label for="">Captcha Code </label>
                            <br>
                            <img src="captcha.php" alt="Captcha code">
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </form>


        </div>
    </div>
</div>
</body>
</html>