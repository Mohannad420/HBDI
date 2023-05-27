<?php
    session_start();

// connect data base
include 'conn.php';
if(isset($_GET['id'])){
    $GLOBALS['a'] = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $id = $GLOBALS['a'];
 
    $_SESSION['id'] = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

}

// Delete Funcyion ----------------------------------------------------------------------

function foo() 
{
    include 'conn.php';
    $id = $GLOBALS['a'];

    $del = "SELECT email FROM users WHERE ID = '$id'";
    $q=$conn->prepare($del);
    $q->execute();
    $data=$q->fetch();
    
    if($data){
    
        $conn = mysqli_connect('localhost','root','','hdmi-pro');
        MYSQLI_SET_CHARSET($conn , 'utf8');
        $dell = "DELETE FROM users WHERE ID = $id ";
        $conn->prepare($dell)->execute();
    
        header ('location:index.php');
    }
}

// Delete -----------------------------------------------------------------------------------------------------------

if(isset($_GET['del'])){
foo();
}


    // submit ----------------------------------------------------------------------------------------------------

if(isset($_POST['submit'])){
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $emai = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $email = filter_var($emai,FILTER_VALIDATE_EMAIL);

    $error=[];

    // VALIDATE NAME 
    if(empty($name)){
        $error[] = "الرجاء ادخال الاسم";
    }elseif(strlen($name) > 40){
        $error[] = "الاسم طويل جدآ";
    }else{
        // VALIDATE EMAIL
        if(empty($emai)){
            $error[]="الرجاء ادخال البريد الالكتروني";
        }elseif($email == false){
            $error[]= "البريد الالكتروني غير صالح";
        }else{
            $stm = "SELECT email FROM users WHERE email = '$email'";
            $q=$conn->prepare($stm);
            $q->execute();
            $data=$q->fetch();
            if($data){
                // foo();
        
                // $sstm = "INSERT INTO users VALUES('','$name','$email','0000')";
        
                // $conn->prepare($sstm)->execute();
                $error[] = "البريد الالكتروني موجود بالفعل";
                $js = 'ok';
                $nn = $name;
                $ee = $email;
                // $stm = "UPDATE `users` SET `Name` = '$name', `Email` = '$email' WHERE `users`.`ID` = '$id'";
                // $conn->prepare($stm)->execute();
            }else{
                    // INSERT to DATABASE
                if(empty($error)){
                    $tm = "تم تسجيل الحساب بنجاح";

                    $stm = "INSERT INTO users VALUES('','$name','$email','0000','','','','')";
                    $conn->prepare($stm)->execute();



                }
            }
        }
    }
}

// Edit -------------------------------------------------------------send-------------------------------------------------------------

if(isset($_POST['edit'])){
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $emai = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $email = filter_var($emai,FILTER_VALIDATE_EMAIL);

    $error=[];

    // VALIDATE NAME 
    if(empty($name)){
        $error[] = "الرجاء ادخال الاسم";
    }elseif(strlen($name) > 40){
        $error[] = "الاسم طويل جدآ";
    }else{
    // VALIDATE EMAIL
        if(empty($emai)){
            $error[]="الرجاء ادخال البريد الالكتروني";
        }elseif($email == false){
            $error[]= "البريد الالكتروني غير صالح";
        }else{
            if(empty($error)){
                // echo $id;
                
                $id = $_SESSION['id'];
                $stm = "UPDATE `users` SET `Name` = '$name', `Email` = '$email' WHERE `users`.`ID` = '$id'";
                $conn->prepare($stm)->execute();

                header ('location:exit.php');




        
            }
        }
    }




}

//  Get Name and Email --------------------------------------------------------------------------------------------------------------

if(!empty($id) and !empty($_SESSION['id'])){
    $id = $_SESSION['id'];
    $conn = mysqli_connect('localhost','root','','hdmi-pro');
    MYSQLI_SET_CHARSET($conn , 'utf8');
    $query = "SELECT * FROM users WHERE ID = '$id'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $resultSet = $stmt->get_result();
    $iddi = $resultSet->fetch_all(MYSQLI_ASSOC);

    if (count($iddi)> 0) { 
        if(!empty($iddi)){
            $js = 'ok';
            foreach($iddi as $key=>$val1){
                $eName = $val1['Name'] ;
                $eEmail = $val1['Email'] ;

            }
        }
    }
}

if(isset($_GET['tm'])){
    $tm = "تم تعديل الحساب بنجاح";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-image: linear-gradient(yellow, hotpink);  min-height: 100vh;">
    <div class="container-fluid row d-flex justify-content-center m-0  "  >
        

                <!-- FORM -->
                    <form class=" p-4 bg-dark text-light col-12 col-md-6 " style="height:30%;" action="index.php" method="post" >
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name (max:40)</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" 
                            value="<?php if(isset($eName)){echo $eName;}elseif(isset($nn)){echo $nn;} ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1"  class="form-label">Email (max:40)</label>
                            <input type="email" class="form-control" name="email" id="exampleInputPassword1"
                            value="<?php if(isset($eEmail)){echo $eEmail;}elseif(isset($ee)){echo $ee;} ?>"></input>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary px-3 me-2">Send</button>
                        <?php if(isset($js)){ echo '<button type="submit" name="edit" class="btn btn-info px-3">Edit</button>';} ?>


                            <button class="btn btn-warning float-end" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-search"></i>   
                            </button>

                       
                    </form>

                    <div class="collapse col-3 p-0 " id="collapseExample" style="
                        width: auto ;
                        position: absolute;
                        bottom: 43.5%;
                        left:67.5%;
                        z-index: 99;">
                        <div class="card card-body p-0">
                            <form action="index.php"  method="get " class="p-0">
                                <div class="input-group ">
                                    <div class="form-floating  ">
                                        <input type="search" class="form-control form-control-lg " name="text" id="name" placeholder="name@example.com" >
                                        <label for="name">Sreach </label>
                                    </div>
                                    <button type="submit" name="search" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>                        
                        </div>
                        
                    </div>

                    <ul class="dropdown-menu p-0 m-0 w-25 ">
                                <li class="">

                                 </li>
                            </ul>


        
        <!-- database requair -->

        <h2 id="x" class=" text-center  mt-5 mb-2  <?php if(isset($tm)){echo 'ok';}elseif(!empty($error)){echo 'no'; } ?> ">
        <?php 
        if(isset($_POST['submit']) && !empty($error)){
            echo $error[0] . '<br><i class="fa-solid fa-triangle-exclamation pt-2 text-warning "></i>' ;
        }elseif(isset($tm)){
            echo $tm ;
        }else{echo "_ Tasks _";} ?>
        </h2>
        <div class=" col-12 col-md-10  ">
            <table class="  table table-dark table-striped   ">
                <thead class="d-stcky top-0 ">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Edit || Delete</th>
    
                    </tr>
                </thead>
                <tbody>


                    <?php

                    if(isset($_GET['search'])){

                        // عملية بحث
                        $search = $conn->prepare("SELECT * FROM users WHERE Name LIKE :value ");
                        $search_value = "%".$_GET['text']."%";
                        $search->bindParam("value",$search_value);
                        if($search->execute()){
                            $conn = mysqli_connect('localhost','root','','hdmi-pro');
                            MYSQLI_SET_CHARSET($conn , 'utf8');
                            $query = "SELECT * FROM users WHERE Name LIKE '%$search_value%' ";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $resultSet = $stmt->get_result();
                            $datas = $resultSet->fetch_all(MYSQLI_ASSOC);
    
                            echo '<a href="#soso"class="btn btn-sm btn-info position-relative mt-2 ">
                            Members 
                            <span class="position-absolute top-0 start-100 translate-middle badge  bg-danger">
                            '.count($datas).'
                            <span class="visually-hidden">unread messages</span>
                            </span>
                            </a>';
                        }
                        
                        foreach($search as $val){
                        echo '
                        <tr>
                        <th>'.$val['ID'].'</td>
                        <td>'.$val['Name'].'</td>
                        <td>'.$val['Email'].'</td>
                        <td >

                        <a href="index.php?id='. $val['ID'].'" type="button" class="btn btn-sm btn-primary"  >
                        Edit
                        </a>

                        <div class="dropdown dropend d-inline">
                        <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown">
                            Delete
                        </button>
                        <ul class="dropdown-menu p-0 m-0 w-25 ">
                        <li class=""><a href="index.php?id='. $val['ID'].'&del=1" class=" text-center dropdown-item btn btn-sm btn-Warning " >Confirm Deletion</a></li>

                        </ul>
                        </div>

                        </td>
                        </tr>';
                        }
                    }else{

                        $conn = mysqli_connect('localhost','root','','hdmi-pro');
                        MYSQLI_SET_CHARSET($conn , 'utf8');
                        $query = "Select * from users";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $resultSet = $stmt->get_result();
                        $datas = $resultSet->fetch_all(MYSQLI_ASSOC);

                        echo '<a href="#soso"class="btn btn-sm btn-info position-relative mt-2 ">
                        Members 
                        <span class="position-absolute top-0 start-100 translate-middle badge  bg-danger">
                        '.count($datas).'
                        <span class="visually-hidden">unread messages</span>
                        </span>
                        </a>';
                        if (count($datas)> 0) { 

                            foreach($datas as $key=>$val){
                                echo '
                                <tr>
                                <th>'.$val['ID'].'</td>
                                <td>'.$val['Name'].'</td>
                                <td>'.$val['Email'].'</td>
                                <td >

                                    <a href="index.php?id='. $val['ID'].'" type="button" class="btn btn-sm btn-primary"  >
                                    Edit
                                    </a>

                                    <div class="dropdown dropend d-inline">
                                        <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown">
                                            Delete
                                        </button>
                                        <ul class="dropdown-menu p-0 m-0 w-25 ">
                                        <li class=""><a href="index.php?id='. $val['ID'].'&del=1" class=" text-center dropdown-item btn btn-sm btn-Warning " >Confirm Deletion</a></li>
                    
                                        </ul>
                                    </div>
                                
                                </td>
                                </tr>
                                ';
                                }
                        }
                    }
                    ?>

                </tbody>
            </table> 
        </div>

    </div>





<p id="soso"></p>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>