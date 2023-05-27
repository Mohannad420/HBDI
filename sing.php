<?php
session_start();
if(isset($_POST['submit'])){
    include 'connect.php';
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $emai = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $email = filter_var($emai,FILTER_VALIDATE_EMAIL);

    $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $password1 = filter_var($_POST['password1'],FILTER_SANITIZE_STRING);
    $error=[];

    // VALIDATE NAME 
    if(empty($name)){
        $error[] = "الرجاء ادخال الاسم";
    }elseif(strlen($name) > 40){
        $error[] = "الاسم طويل جدآ";
    }

    // VALIDATE EMAIL
    if(empty($emai)){
        $error[]="الرجاء ادخال البريد الالكتروني";
    }elseif($email == false){
        $error[]= "البريد الالكتروني غير صالح";
    }
    $stm = "SELECT email FROM users WHERE email = '$email'";
    $q=$db->prepare($stm);
    $q->execute();
    $data=$q->fetch();

    if($data){
        $error[] = "البريد الالكتروني مستخدم بالفعل";
    }

    // VALIDATE PASSWORD 
    if(empty($password) or empty($password1)){
        $error[]= "الرجاء ادخال كلمة المرور";
    }else{
        if(strlen($password) <= 20 and strlen($password) >= 6  ){
            if($password != $password1){
                $error[]= "كلمة المرور غير متطابقة";
            }
        }elseif(strlen($password) < 6 and strlen($password) != 0){
            $error[]= "كلمة المرور قصيرة جدآ";
        }else{
            $error[]= "كلمة المرور طويل جدآ";
        }
    }

    // INSERT to DATABASE
    if(empty($error)){
        $hashed_password = md5($password);

        $stm = "INSERT INTO users VALUES('','$name','$email','$hashed_password','','','','')";

        $db->prepare($stm)->execute();
        $_SESSION['Name'] = $name;
        $_SESSION['Close'] = 'ok';
        $_SESSION['Email'] = $email ;

        header('location:index.php');

    }
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="all.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>index</title>
    <link rel="stylesheet" href="css00.css">
</head>
<body class=" " style="background-image: url(img/sho.jpg);    background-repeat:no-repeat;background-size: ;">
<?php require_once "navbar.php" ?>

<div class="container-fluid row text-center d-flex justify-content-center m-0 p-0 mt-4 " style="height:85vh;">
    <form method="POST" class=" col-10 col-sm-8 col-md-6 col-lg-4 row container d-flex justify-content-center  pb-4 pt-3 " style="background-color: #33d1cc4a;color: var(--green); border-radius: 30px; ">
        <h1 class="fw-bold p-0 my-2 "style="color:var(--sec);">Sign Up </h1>
        <div class="col-11  ">
            <div class="form-floating  ">
                <input type="text" class="form-control " name="name" id="name" placeholder="name@example.com" style=" border-radius: 20px;height: " 
                value="<?php if(isset($name)){echo $name ;}?>" >
                <label for="name" >Your Name </label>
            </div>
        </div>
        <div class="col-11 ">
            <div class="form-floating ">
                <input type="email" class="form-control" name="email" id="email1" placeholder="name@example.com"style=" border-radius: 20px;height: "
                value="<?php if(isset($email)){echo $email ;}?>" >
                <label for="email1">Email Address</label>
            </div>
        </div>
        <div class="col-11">
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="password"style=" border-radius: 20px;height: " >
                <label for="password">Password</label>
            </div>
        </div>        
        <div class="col-11">
            <div class="form-floating">
                <input type="password" class="form-control" id="password1" name="password1" placeholder="password" style=" border-radius: 20px;height: ">
                <label for="password1">Confirm Password</label>
            </div>
        </div>

        <!--errors-->
        <h3 class="text-warning m-0 mb-1" style="max-height:12%;"><?php

        if(isset($_POST['submit']) and !empty($error)){echo $error[0] . '<br><i class="fa-solid fa-triangle-exclamation pt-2 "></i>';}

        ?></h3>

        <div class="text-center  ">
            <button name="submit" type="submit" class="btn btn-primary fw-bold rounded-pill fs-5 px-5 ">Create New Account</button>            
        </div>
    </form>
</div>


</body>
</html>