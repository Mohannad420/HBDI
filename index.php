<?php
session_start();
if(isset($_SESSION['Email'])){
    $ro = $_SESSION['Email'] ;
    $conn = mysqli_connect('localhost','root','','hdmi-pro');
    MYSQLI_SET_CHARSET($conn , 'utf8');
    $stm = "SELECT * FROM users WHERE email = '$ro'";
    $check = mysqli_query($conn , $stm);
    $result = mysqli_fetch_assoc($check);

    $dataA = $result['countsA'];
    $dataB = $result['countsB'];
    $dataC = $result['countsC'];
    $dataD = $result['countsD'];
}else{

}


// document.cookie = "countsA=" + countsA ;
// document.cookie = "countsB=" + countsB ;
// document.cookie = "countsC=" + countsC ;
// document.cookie = "countsD=" + countsD ;   

setcookie('ok', '', time()-1000);//kill it more


if(isset($_POST['submit'])){
    $setPassword = $_POST['password'];
    $Email = $_POST['email'];
    $sanEmail = filter_var($Email,FILTER_SANITIZE_EMAIL);
    $valEmail = filter_var($sanEmail,FILTER_VALIDATE_EMAIL);

    
// $hashed_password = password_hash($password, PASSWORD_DEFAULT); تشفير كلمة المرور
// $TRUE/FALSE = password_verify($setPassword,$password_hash) ; فك تشفير كلمة المرور والمقارنه

    if(!empty($Email)){
        if($valEmail != false){
            // الاتصال والمقارنه مع الداتا بيس
            // $stm = "SELECT * FROM users WHERE email = '$valEmail'";
            // $q=$db->prepare($stm);
            // $q->execute();
            // $data=$q->fetch();
            
            // الاتصال والمقارنه مع الداتا بيس

            $conn = mysqli_connect('localhost','root','','hdmi-pro');
            MYSQLI_SET_CHARSET($conn , 'utf8');

            $stm = "SELECT * FROM users WHERE email = '$valEmail'";
            $check = mysqli_query($conn , $stm);
            $result = mysqli_fetch_assoc($check);

            
            if(!$result){
                $salh = 'لا يوجد حساب بهذا الاسم';

            }else{
                $username = $result['Name'];
                $encpass = $result['Password'];
                $EmailSess = $result['Email'];

                if(md5($setPassword) != $encpass){
                    $salh = 'خطأ في كلمة المرور';
    
                }else{
                    $_SESSION['Close'] = 'ok';
                    $_SESSION['Name'] = $username ;
                    $_SESSION['Email'] = $EmailSess ;

                    $salh = " تم تسجيل الدخول بنجاح ";
                    header ('location:index.php') ;
                }
            }
            

            
        }else{
            $salh = 'البريد غير صالح';
        }

    }else{
        $salh = " الرجاء ادخال البريد الالكتروني ";
    }
}else{
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
    <link rel="shortcut icon" href="https://www.symbols.com/images/symbol/1/270_registered-trademark-symbol.png" type="image/x-icon">

    <style>
    
    .box {
  padding: 5px;
  overflow: hidden;
  position: relative  ;
  background: var(--green) solid 40px ;  
}
#A , #B , #C , #D {
  font-weight: 600;
  font-size: large;
  color:black;
  height: px;

}
#grad1 {
  height: 200px;
  width: 200px;
  background-color: red; /* For browsers that do not support gradients */
  background-image: conic-gradient(#ffff7e 0deg, yellow 90deg, #ff6969 90deg, red 180deg,red 0deg, red 90deg, #6dff6d 180deg, green 270deg, #6363ff 270deg ,blue 360deg);          border-radius: 50%;
  outline : 2px black solid ;
  position: relative;

}
.act{
background-color:var(--btn) !important;
color: var(--sec) !important ;

}
.mo{
    border-bottom: 0.2px solid #0d020221  !important;
    border-top: 0.2px solid #0d020221  !important;

}
.in{
    text-align: center;
}
p.in{
    font-size:12px;
}


    .carousel-caption{
        background: rgba(0, 0, 0, 0.649) ;
        margin-bottom: 5%;
    }
    div > img {
        object-fit: cover;
    }
    </style>
</head>

<body>
    <?php require_once 'navbar.php' ?>
         <?php
        if(isset($salh)){
            $visi = "";
        }
        ?>


<!-- Carousel -->
<div id="demo1" class="carousel slide" data-bs-ride="carousel">


  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item ">
      <img src="img/AS.png" alt="Los Angeles" class="d-block" style="width:100%;height: 65vh;">
      <div class="carousel-caption">
        <h3>سجل الدخول وابدأ الاختبار</h3>
        <p class="text-white-50 px-1 ">يستغرق الاختبار 3 دقائق فقط لكي تبدأ في طريقك باكتشاف قدارتك المدفونه في داخلك</p>
        <a 
        <?php
        if(isset($_SESSION['Close'])){
            echo 'href="HBDI.php"';
        }else{
            echo 'data-bs-toggle="offcanvas" data-bs-target="#demo"';
        }
        ?>

         class=" btn main-btn rounded-pill my-2 " ><b 
                 <?php
        if(!isset($_SESSION['Close'])){
            echo 'data-bs-toggle="modal" data-bs-target="#exampleModal2"';
        }?>
         class="px-4 py-2 ">HBDI بدأ اختبار</b></a>
      </div>
    </div>
    <div class="carousel-item active">
      <img src="img/BBB.png" alt="Chicago" class="d-block" style="width:100%;height: 65vh;">
      


      <div class="carousel-caption">
        <h3>علاقتك مع احبابك</h3>
        <p class="text-white-50 px-1 ">تساهم المعرفة والابحاث في تحسين علاقاتك مع من تحب</p>
                <a 
        <?php
        if(isset($_SESSION['Close'])){
            echo 'href="HBDI.php"';
        }else{
            echo 'data-bs-toggle="offcanvas" data-bs-target="#demo"';
        }
        ?>

         class=" btn main-btn rounded-pill my-2" ><b 
                 <?php
        if(!isset($_SESSION['Close'])){
            echo 'data-bs-toggle="modal" data-bs-target="#exampleModal2"';
        }?>
         class="px-4 py-2">HBDI بدأ اختبار</b></a>
      </div> 
    </div>
    <div class="carousel-item">
      <img src="img/DDD.png" alt="New York" class="d-block" style="width:100%;height: 65vh;">
      <div class="carousel-caption">
        <h3>بناء علاقات ناجحة</h3>
        <p class="text-white-50 px-1 ">لنصنع بيئة عمل صحية و متوافقة مع زملائك</p>
                <a 
        <?php
        if(isset($_SESSION['Close'])){
            echo 'href="HBDI.php"';
        }else{
            echo 'data-bs-toggle="offcanvas" data-bs-target="#demo"';
        }
        ?>

         class=" btn main-btn rounded-pill my-2" ><b 
                 <?php
        if(!isset($_SESSION['Close'])){
            echo 'data-bs-toggle="modal" data-bs-target="#exampleModal2"';
        }?>
         class="px-4 py-2">HBDI بدأ اختبار</b></a>
      </div>  
    </div>
      <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo1" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo1" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
  </div>
  


        <?php
        if(isset($salh)){
            $visi = "";
        }
        ?>

        <button class="alert alert-dismissible px-0 text-info text-center " style="position:fixed;top:60px;left:0.1px;right:0.1px;background-color:#948902a3;visibility:<?php if(isset($salh)){ echo 'visible';}else{echo 'hidden';} ?>;"data-bs-dismiss="alert">
            <h6  class=" text-decoration-none alert-link m-0"> <?php echo $salh ; ?>  </h6> 
        </button>




<div class="container ">
    <div class="text-center mb-5 mt-2">
        <img src="img/are.png" alt="" style="width:200px;">
        <h2 class="text-uppercase mb-3">ما هي نظرية هيرمان ؟</h2>
        <p class="fs-5 text-black-50">نظرية بوصلة التفكير أو ( مقياس هيرمان للتفكير ) <br>، تسعى إلى فهم السلوك البشري وقياس أنماط التفكير لدى البشر </p>
        <div class=" w-25 mx-auto" style=" height: 2px ; background: var(--green);"></div>

        <div dir="rtl" class="row mt-5">
            <div class="col-md-4 px-5">
                <i class="fa-solid fa-1"style=" position: relative; z-index: 1;font-size:200px;color: rgba(0, 0, 0, 0.2);"><i class="fa-solid fa-pen" style="color: var(--green); position: absolute; z-index: 999;font-size:60px; left: 50%; bottom: 10%;"></i></i>
                
                <h5 class="mt-4" style="color:var(--text)">التطرق لـ أنواع الأبحاث العلمية</h5>
                <p class="text-black-50 mt-3 mb-3">
                . تمت بناء هذا الاختبار بكفاءه عاليه وتمت الاستعانة بابحاث ومصادر رسمية</p>
            </div>
            <div class="col-md-4 px-5">
                <i class="fa-solid fa-2"style=" position: relative; z-index: 1;font-size:200px;color: rgba(0, 0, 0, 0.2);"><i class="fa-solid fa-tv" style="color: var(--green); position: absolute; z-index: 999;font-size:60px; left: 50%; bottom: 10%;"></i></i>
                
                <h5 class="mt-4" style="color:var(--text)">طرق تحليل البيانات آليًا</h5>
                <p class="text-black-50 mt-3 mb-3">
                  . تم بناء هذا الاختبار بواسطة فريق برمجي محترف ,ليحاكي الاختبار هيرمان بدقة وسلاسة </p>
            </div>            
            <div class="col-md-4 px-5">
                <i class="fa-solid fa-3"style=" position: relative; z-index: 1;font-size:200px;color: rgba(0, 0, 0, 0.2);"><i class="fa-solid fa-plug" style="color: var(--green); position: absolute; z-index: 999;font-size:60px; left: 50%; bottom: 10%;"></i></i>
                
                <h5 class="mt-4" style="color:var(--text)">حفظ البيانات </h5>
                <p class="text-black-50 mt-3 mb-3">
                   . سيتم حفظ البيانات لاستخدامها لاحقآ من قبل المستخدمين وعمل مقارنه بين الشخصيات</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 text-center " style="background-image:linear-gradient(#f8f9fa,rgb(0 0 0 / 25%));">
    <div class="text-center my-5">
        <img src="img/title.png" alt="" style="width:100px;">
        <h2 class="text-uppercase mt-4">الاعضاء وبياناتهم</h2>
        <p class="text-black-50" id="asd">انقر على الشخص لحساب نسبة التشابه بينكم </p>
        <div class=" mx-auto" style=" height: 2px ; background: var(--green); width: 100px;"></div>
    </div>
    <nav class="down-nav">
            <ul class="nav justify-content-center nav-pills">
                <li class="nav-item"><a href="#asd" data-tabs="ALL" class="mo mx-2 my-1 nav-link main-btn rounded-pill act" >عرض الجميع</a></li>
                <li class="nav-item"><a href="#asd" data-tabs="AJ" class="mo mx-2 my-1 nav-link main-btn rounded-pill"> عقلانيون</a></li>
                <li class="nav-item"><a href="#asd" data-tabs="BJ" class="mo mx-2 my-1 nav-link main-btn rounded-pill"> تنفيذيون</a></li>
                <li class="nav-item"><a href="#asd" data-tabs="CJ" class="mo mx-2 my-1 nav-link main-btn rounded-pill"> عاطفيون</a></li>
                <li class="nav-item"><a href="#asd" data-tabs="DJ" id="asdd" class="mo mx-2 my-1 nav-link main-btn rounded-pill"> إبداعيون</a></li>
            </ul>
    </nav>
    <hr id="bbb">
    <div class="container my-5">
        <div class="row">
               <div class="container my-5">
        <div id="fltr" class="row">
                        <?php

$conn = mysqli_connect('localhost','root','','hdmi-pro');
MYSQLI_SET_CHARSET($conn , 'utf8');
                        $query = "Select * from users";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $resultSet = $stmt->get_result();
                        $datas = $resultSet->fetch_all(MYSQLI_ASSOC);
                         
                        if (count($datas)> 0) { 

    if(empty($_GET['M'])){
     $_SESSION['w'] = 1 ;
     }
                            foreach($datas as $key=>$val){
                                    
                                $clas1 = '';
                                $clas2 = '';
                                $clas3 = '';
                                $clas4 = '';

                                $countsA = $val['countsA'] ;

                                $countsB = $val['countsB'] ;
                          
                                $countsC = $val['countsC'] ;
                          
                                $countsD = $val['countsD'] ;
                                     
                                if($countsA >=  $countsB && $countsA >= $countsC && $countsA >= $countsD){
                                    $h1 =" _ ( <em>".$val['Name']."</em> ) _<br>العقلية التحليلية" ;
                                    $class = "text-primary";
                                    $clas1 = "progress-bar-striped";
                                    $dataT = "AJ" ;
                                    }
                                    
                                    if($countsB >= $countsA && $countsB >= $countsC && $countsB >= $countsD){
                                    $h1 = " _ ( <em>".$val['Name']."</em> ) _<br>العقلية التنظيمية" ;
                                    $class = "text-success";
                                    $clas2 = "progress-bar-striped";
                                    $dataT = "BJ" ;
        
                                    
                                    }
                                    
                                    if($countsC >= $countsA && $countsC >= $countsB && $countsC >= $countsD){
                                    $h1 = " _ ( <em>".$val['Name']."</em> ) _<br>العقلية الإنسانية ";
                                    $class = "text-danger";
                                    $clas3 = "progress-bar-striped";
                                    $dataT = "CJ" ;
        
        
                                    }
                                    
                                    if($countsD >= $countsA && $countsD >= $countsB && $countsD >= $countsC){
                                    $h1 = " _ ( <em>".$val['Name']."</em> ) _<br> العقلية الإبداعية";
                                    $class = "text-warning";
                                    $clas4 = "progress-bar-striped";
                                    $dataT = "DJ" ;
        
        
                                    }


                                echo '            <div id="vs" class=" '.$dataT.' col-lg-3 col-md-4 col-sm-6">

                                <div onclick="';

                                if(empty($_SESSION['Close'])){
                                $id = 'data-bs-toggle="modal" data-bs-target="#exampleModal2"';
                                }else{
                                    echo '
                                dataA = '.$dataA.'
                                dataB = '.$dataB.'
                                dataC = '.$dataC.'
                                dataD = '.$dataD.'  

                                soso1 = '.number_format($val['countsA'], 0).'
                                soso2 = '.number_format($val['countsB'], 0).'
                                soso3 = '.number_format($val['countsC'], 0).'
                                soso4 = '.number_format($val['countsD'], 0).'

                                    xxx()
                                
                                ';
                                $id = 'data-bs-toggle="modal" data-bs-target="#myModal"';
                                }


                                        

                                echo '
                                " id="dis"  class="box '.$dataT.' container rounded text-center mb-4  " '.$id.' style="height:90%;background:var(--sec);" data-work=" '.$val['Name'].' انقر للمقارنة مع   ">
                                    <h6 id="h1" class="text-center  '.$class.'  mt-2">'.$h1.'</h6>
                                    <hr style="margin-bottom: 11px;">
                                    <div class="container-fluid p-0 m-0 row ">
                
                                        <div class="container-fluid p-0 m-0 px-2 col-12 ">

                                            <div  class="mx-1 mt- "style="display:flex;      justify-content: space-between;">
                                                <p class=" in text-start text-black mb-0 mt-2">'. number_format($val['countsA'], 0).'%</p>
                                                <p class=" in text-black-50 ms-0 mb-0 mt-2">عقلاني</p>
                                            </div>

                                            <div dir="rtl" class="progress mb-2 mt-1 m-1 " style="height:6px;">
                                                <div class="progress-bar bg-praimry  progress-bar-animated" id="A" role="progressbar" style="width: '. $countsA.'%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                
                                            <div class="mx-1"style="display:flex;      justify-content: space-between;">
                                                <p class=" in text-start text-black  mb-0 mt-2">'. number_format($val['countsB'], 0).'%</p>
                                                <p class=" in text-black-50 ms-0 mb-0 mt-2">تنفيذي</p>
                                            </div>    

                                            <div dir="rtl" class="progress mb-2 mt-1 m-1 " style="height:6px;">
                                                <div class="progress-bar bg-success  progress-bar-animated" id="B" role="progressbar" style="width: '. $countsB.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                
                                            <div class="mx-1"style="display:flex;      justify-content: space-between;">
                                                <p class=" in text-start text-black mb-0 mt-2">'. number_format($val['countsC'], 0).'%</p>
                                                <p class=" in  ms-0 text-black-50 mb-0 mt-2">عاطفي</p>
                                            </div>    

                                            <div dir="rtl" class="progress mb-2 mt-1 m-1 " style="height:6px;">
                                                <div class="progress-bar bg-danger  progress-bar-animated" id="C" role="progressbar" style="width: '. $countsC.'%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                 
                                            <div class="mx-1"style="display:flex;      justify-content: space-between;">
                                                <p class=" in text-start text-black mb-0 mt-2">'. number_format($val['countsD'], 0).'%</p>
                                                <p class=" in  ms-0 text-black-50 mb-0 mt-2">إبداعي</p>
                                            </div>   

                                            <div dir="rtl" class="progress mb-4 mt-1 m-1 " style="height:6px;">
                                                <div class="progress-bar bg-warning  progress-bar-animated" id="D" role="progressbar" style="width: '. $countsD.'%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                                                     ';


                                
                                }
                                                             
                        }


                        ?>

        </div>
    </div>
        </div>
    </div>
    <button id="next" onclick="xo()" class=" btn main-btn rounded-pill px-3 py-2" ><strong>عرض المزيد</strong></button>
</div>

<div class="modal fade text-center" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-info mx-auto ps-4" id="exampleModalLabel">الرجاء تسجيل الدخول</h4>
        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
الرجاء تسجيل الدخول او انشاء حساب جديد لنتمكن من الاتصال بالبيانات 
     </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">



        <!-- Modal body -->
        <div class="modal-body m-1 " >
            <h3 class="text-center mt-1 p-0 " style="">نسبة التشابه بينكم هي<br>( <code class="h1" id="xss">23%</code> )</h3>
            <div class=" mx-auto " style=" height: 2px ; background: #ebebeb; width: 70%;"></div>

        <h5 class="text-end mt-3  ">: نسبة التشابه <strong class="text-primary">العقلاني</strong> بينكم هي </h5>
        <div class="progress m-1 mb-2 p-1" style="height:20%;" >
            <div class="progress-bar rounded  py-1 progress-bar-striped text-primary" role="progressbar" id="VA" style="width: 0%;background:var(--nav);" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">x</div>
        </div>

        <h5 class="text-end  ">: نسبة التشابه <strong class="text-success">التنفيذي</strong> بينكم هي </h5>
        <div class="progress m-1 mb-2 p-1" style="height:20%;" >
            <div class="progress-bar rounded py-1  progress-bar-striped text-success " role="progressbar" id="VB" style="width: 0%;background:var(--nav);" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">x</div>
        </div>

        <h5 class="text-end   ">: نسبة التشابه <strong class="text-danger">العاطفي</strong> بينكم هي </h5>
        <div class="progress m-1 mb-2 p-1"style="height:20%;" >
            <div class="progress-bar rounded  py-1 progress-bar-striped text-danger " role="progressbar" id="VC" style="width: 0%;background:var(--nav);" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">x</div>
        </div>

        <h5 class="text-end  ">: نسبة التشابه <strong class="text-warning">الإبداعي</strong> بينكم هي </h5>
        <div class="progress m-1 mb-2 p-1"style="height:20%;" >
            <div class="progress-bar rounded py-1  progress-bar-striped text-warning" role="progressbar" id="VD" style="width: 0%;background:var(--nav);" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">x</div>
        </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger main-btn m-auto rounded-pill px-5" data-bs-dismiss="modal"><b>Close</b></button>
        </div>

    </div>
  </div>
</div>

<div class="container-fluid pt-5  ">
    <div class="text-center mt-5">
        <img src="img/title.png" alt="" style="width:100px;">
        <h2 class="mt-4">معلومات يجب ان تعرفها </h2>
        <p class="text-black-50"> نظرية هيرمان حصلت ع جائزة نوبل سنة 1911 .</p>
        <div class=" mx-auto" style=" height: 2px ; background: var(--green); width: 100px;"></div>
        <div class=" mx-auto my-4" style="max-width: 500px;"><p dir="rtl" class="text-black-50 text-center">نظرية هيرمان أو "نظرية الاستيعاب الذاتي" هي إحدى النظريات التعليمية التي تركز على دور الفرد في تعلمه الذاتي. تعتبر هذه النظرية من أهم النظريات الحديثة التي تناقش تعلم البالغين وكيفية التعلم الذاتي الفعال.</p>
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-md-start">
                <h4 dir="rtl" class="mt-4">تعتمد النظرية على ثلاثة عوامل رئيسية لتعلم الفرد</h4>

                <p dir="rtl" class="text-black-50">1-
                 المصادر: حيث يجب أن يختار الفرد المصادر الملائمة والموثوقة لتعلم المعلومات التي يحتاجها. وتشمل هذه المصادر الكتب والدورات التدريبية والمواد المتعلقة بالموضوعات التي يريد الفرد دراستها.
<br>
<br>
2-
 الخبرات السابقة: حيث يعتمد تعلم الفرد على الخبرات التي يمتلكها بالفعل. فالفرد يستطيع توظيف هذه الخبرات لتسهيل عملية التعلم وفهم المفاهيم الجديدة.
<br>
<br>
3- الهدف: يجب أن يحدد الفرد أهدافه التعليمية وأهدافه الشخصية والمهنية، وتوجيه عملية التعلم نحو تحقيق هذه الأهداف.</p>
                <a href="#" class=" btn main-btn rounded-pill px-3 py-2 mb-4" ><strong>إقرأ المزيد</strong></a>

            </div>
            <div class="col-md-8">
                <img class="img-fluid mt-5 float-end" src="img/gogo.gif" alt="...">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5 text-center " style="background-color:var(--sec);">
    <div class=" container text-center my-4">
        <h2 class="  " style="color:var(--text);"><b>انماط شخصيات نظرية هيرمان</b></h2>
        <p class=" mt-2 text-black-50"> : تشير النظرية إلى وجود أربعة نماذج رئيسية للشخصية وفقًا لطريقة عملها, وهي كالتالي</p>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col-md-3 mb-4">
                <div class="card-img-top"><img class="img-fluid p-0" src="img/ko1.png" style="height:288px;width:100%;" alt="..."></div>
                <div class="card-body" style="background:var(--green);">
                    <div class="card-title text-white"><h3 class="m-0 p-3">الشخصية البصرية (Visual)</h3></div>
                </div>
                <div dir="rtl" class="card-text text-black-50 p-3 bg-white m-0">“يميل الأشخاص الذين يتبعون هذا النمط إلى استخدام الصور والرسوم والخرائط الذهنية للتعلم.“</div>
            </div>        
            <div class="col-md-3 mb-4">
                <div class="card-img-top"><img class="img-fluid p-0" src="img/ko2.png" style="height:288px;" alt="..."></div>
                <div class="card-body" style="background:var(--green);">
                    <div class="card-title text-white"><h3 class="m-0 p-3"> الشخصية السمعية (Auditory)</h3></div>
                </div>
                <div dir="rtl" class="card-text text-black-50 p-3 bg-white m-0">“ يميل الأشخاص الذين يتبعون هذا النمط إلى الاستماع للمعلومات والحوارات والمناقشات لتعلم المفاهيم الجديدة.“</div>
            </div>        
            <div class="col-md-3 mb-4">
                <div class="card-img-top"><img class="img-fluid p-0" src="img/ko3.png" style="height:288px;" alt="..."></div>
                <div class="card-body" style="background:var(--green);">
                    <div class="card-title text-white"><h3 class="m-0 p-3">الشخصية الحركية (Kinesthetic)</h3></div>
                </div>
                <div dir="rtl" class="card-text text-black-50 p-3 bg-white m-0">“ يميل الأشخاص الذين يتبعون هذا النمط إلى الاعتماد على الحركة والأنشطة العملية والتجارب العملية للتعلم.“</div>
            </div>        
            <div class="col-md-3 mb-4">
                <div class="card-img-top"><img class="img-fluid p-0" src="img/ko4.png" style="height:288px;" alt="..."></div>
                <div class="card-body" style="background:var(--green);">
                    <div class="card-title text-white"><h3 class="m-0 p-3">الشخصية اللفظية (Verbal)</h3></div>
                </div>
                <div dir="rtl" class="card-text text-black-50 p-3 bg-white m-0">“ يميل الأشخاص الذين يتبعون هذا النمط إلى استخدام اللغة المنطوقة والمكتوبة لتعلم المفاهيم الجديدة.“</div>
            </div>        

        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-3 my-2"><img src="img/tech-1.png" alt="" class="img-fluid d-block mx-auto"></div>
            <div class="col-md-3 my-2"><img src="img/tech-2.png" alt="" class="img-fluid d-block mx-auto"></div>
            <div class="col-md-3 my-2"><img src="img/tech-3.png" alt="" class="img-fluid d-block mx-auto"></div>
            <div class="col-md-3 my-2"><img src="img/tech-4.png" alt="" class="img-fluid d-block mx-auto"></div>
        </div>
    </div>
</div>
<!--

<div class="container-fluid p-0">
    <div class=" d-flex justify-content-center align-items-center" style="background-color:var(--nav);height:45vh">
        <div class="text-center">
            <h2 class=" text-white">Start Your Project Now</h2>
            <p class=" text-white-50 mb-5 ">Leave your description and we start the engine.Don't worry,you can cancel anytime.</p>
            <a href="#" class=" btn main-btn rounded-pill px-4 py-2" ><b>START PROJECT</b></a>
        </div>
    </div>
</div>
// <div class="container pt-5 text-center  ">
//     <div class="text-center my-5">
//         <img src="img/title.png" alt="" style="width:100px;">
//         <h2 class="mt-4">Read Our Blog</h2>
//         <p class="text-black-50">NEW STORIES</p>
//         <div class=" w-25 mx-auto" style=" height: 2px ; background: var(--green);"></div>
//     </div>
//     <div class="row">
//         <div class="col-md-6 col-lg-4 mb-4 ">
//           <div class="card">
//             <img src="img/blog-1.jpg" class="card-img-top" alt="Blog Post">
//             <div class="card-body">
//               <span class="text-black-50">Jan 17, 2022</span>
//               <h5 class="card-title">Some Awesome Blog Title Here</h5>
//             </div>
//           </div>
//         </div>
//         <div class="col-md-6 col-lg-4 mb-4">
//           <div class="card">
//             <img src="img/blog-2.jpg" class="card-img-top" alt="Blog Post">
//             <div class="card-body">
//               <span class="text-black-50">Jan 17, 2022</span>
//               <h5 class="card-title">Some Awesome Blog Title Here</h5>
//             </div>
//           </div>
//         </div>
//         <div class="col-md-6 col-lg-4 mb-4">
//           <div class="card">
//             <img src="img/blog-3.jpg" class="card-img-top" alt="Blog Post">
//             <div class="card-body">
//               <span class="text-black-50">Jan 17, 2022</span>
//               <h5 class="card-title">Some Awesome Blog Title Here</h5>
//             </div>
//           </div>
//         </div>
//       </div>
//     <a href="#" class=" btn main-btn rounded-pill px-4 py-2 mb-5 mt-2" ><b>Sign In</b></a>
// </div>

<div class="container-fluid text-md-start " style="background:var(--text);">
    <div class="container py-5 ">
        <form action="" class="row form d-flex justify-content-center align-items-center text-center ">
            <div class="col-md-3  p-0 ">
                <label class=" form-ladel " for="#email"><h5><b>Subscribe to our Newsletter:</b></h5></label>
            </div>
            <div class="col-md-7 ">
                <input class="w-100" type="email" name="email" id="email" placeholder="Enter Email Address">
            </div>
            <div class="col-md-2 ">
                <a href="#" class=" btn rounded-pill px-3 py-2 my-5" style="color:var(--text);background: var(--nav);"><b>Subscribe</b></a>
            </div>
        </form>
    </div>
</div>
-->

<footer class="text-center text-white" style="background:var(--nav) ;">
    <!-- Grid container -->
    <div class="container pt-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a
          class="btn btn-link btn-floating text-white btn-lg  m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-facebook-f"></i
        ></a>
  
        <!-- Twitter -->
        <a
          class="btn btn-link btn-floating text-white btn-lg  m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-twitter"></i
        ></a>
  
        <!-- Google -->
        <a
          class="btn btn-link btn-floating text-white btn-lg  m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-google"></i
        ></a>
  
        <!-- Instagram -->
        <a
          class="btn btn-link btn-floating text-white btn-lg  m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-instagram"></i
        ></a>
  
        <!-- Linkedin -->
        <a
          class="btn btn-link btn-floating text-white btn-lg  m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-linkedin"></i
        ></a>
        <!-- Github -->
        <a
          class="btn btn-link btn-floating text-white btn-lg  m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-github"></i
        ></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center  p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright:
      <a class="" style="color:var(--text) ;" href="https://www.facebook.com/mohannad.shawakh.5">Mohannad Shawakh</a>
    </div>
    <!-- Copyright -->
  </footer>






<!--
<script>


     D = document.getElementById('DR');
     T = document.getElementById('TL');
    D.onkeyup = function(){
        T.value = (D.value * 31) + ' مصري' ;
};
    T.onkeyup = function(){
        D.value = (T.value / 31) + ' دولار' ;
}

</script>
 -->

<script>

function xxx(){
    var progA = document.getElementById("VA");
    progA.style.width = pro(dataA,soso1) + "%" ;
    progA.innerHTML = pro(dataA,soso1).toFixed() + "%";

    let progB = document.getElementById("VB");
    progB.style.width = pro(dataB,soso2) + "%" ;
    progB.innerHTML = pro(dataB,soso2).toFixed() + "%";

    let progC = document.getElementById("VC");
    progC.style.width = pro(dataC,soso3) + "%" ;
    progC.innerHTML = pro(dataC,soso3).toFixed() + "%";

    let progD = document.getElementById("VD");
    progD.style.width = pro(dataD,soso4) + "%" ;
    progD.innerHTML = pro(dataD,soso4).toFixed() + "%";

    let xss = document.getElementById("xss");
    var qqq = (pro(dataA,soso1) + pro(dataB,soso2) + pro(dataC,soso3) + pro(dataD,soso4)) / 4  ;
    xss.innerHTML = qqq + "%";
}


function pro(n1,n2){
arr = n1.toFixed(0) ;
arr2 = n2.toFixed(0) ;
num1 = Math.max(arr,arr2);
num2 = Math.min(arr,arr2);
num1 = num1 - 100 ;
num2 = num2 - 100 ;
                            
num3 = num1 - num2;
num3 = 100 - num3  ;
return num3 ;
}


// let buttons = document.querySelectorAll('.nav-link');
// var jA = document.querySelectorAll(".A");
// var jB = document.querySelectorAll(".B");
// var j = document.querySelectorAll(".C");
// var jB = document.querySelectorAll(".female");

// buttons.forEach(button => {
//     button.addEventListener('click', function() {
//         buttons.forEach(btn => btn.classList.remove('act'));
//         this.classList.add('act');
//     })
// })


// var tabs = document.querySelectorAll(".nav-link");

// var males = document.querySelectorAll(".AJ");
// var females = document.querySelectorAll(".female");
// var all = document.querySelectorAll("#dis");

// tabs.forEach((tab)=>{
// 	tab.addEventListener("click", ()=>{
// 		tabs.forEach((tab)=>{
// 			tab.classList.remove("act");
// 		})
// 		tab.classList.add("act");
// 		// var tabval = item.getAttribute("data-tabs");

// 		all.forEach((item)=>{
// 		item.style.display = "none";

//         var tabval = item.getAttribute("data-tabs");
	    
//         if(tabval == "AJ"){
// 			males.forEach((male)=>{
// 				male.style.display = "block";
// 			})
// 		}
// 		if(tabval == "female"){
// 			females.forEach((female)=>{
// 				female.style.display = "block";
// 		})
// 		}


// 		})

	

// 	})
// })


var tabs = document.querySelectorAll(".mo");
var males = document.querySelectorAll(".AJ");
var females = document.querySelectorAll(".BJ");
var adda = document.querySelectorAll(".CJ");
var dada = document.querySelectorAll(".DJ");
var all = document.querySelectorAll("#vs");

tabs.forEach((tab)=>{
	tab.addEventListener("click", ()=>{
		tabs.forEach((tab)=>{
			tab.classList.remove("act");
		})
		tab.classList.add("act");
        var tabval = tab.getAttribute("data-tabs");

		all.forEach((item)=>{
			item.style.display = "none";

		if(tabval == "AJ"){
			males.forEach((male)=>{
				male.style.display = "block";
			})
		}
		else if(tabval == "BJ"){
			females.forEach((female2)=>{
				female2.style.display = "block";
			})
		}
        		else if(tabval == "CJ"){
			adda.forEach((female3)=>{
				female3.style.display = "block";
			})
		}       		else if(tabval == "DJ"){
			dada.forEach((female4)=>{
				female4.style.display = "block";
			})
		}       		else{
			all.forEach((female5)=>{
				female5.style.display = "block";
			})
                        
            nextButton.onclick = function() { mino() };
            nextButton.innerHTML = "عرض أقل"
             
             nextButton.style.background = '#ff5a00'
            
		}
        
		})



	})
})



//search

const authorSearch = document.getElementById('search');
authorSearch.addEventListener('keyup' , e => {
    let currentValue = e.target.value.toLowerCase();
    let authors = document.querySelectorAll('#h1 > em')
    for (let index = 0; index < listItems.length ; index++) {
    listItems[index].style.display = "block"
    }
    if(currentValue == ''){
        return         mino()

    }


authors.forEach(author => {

if (author.textContent.toLowerCase().includes(currentValue)) {
    author.parentNode.parentNode.parentNode.style.display = "block";
} else {
    author.parentNode.parentNode.parentNode.style.display = "none";
    
}
    })
})
authorSearch.addEventListener('click' , ()=>{
document.getElementById("bbb").scrollIntoView();
})





const listItems = document.querySelectorAll("div#vs");
const nextButton = document.getElementById("next");
listItems.forEach((tab)=>{
tab.style.display = "none"
})
let rr = 16;

for (let index = 0; index < 8 ; index++) {
  listItems[index].style.display = "block"
}



function xo() {
var R = num(rr);

          for (let ww = 0 ; ww < R ; ww++) {
            listItems[ww].style.display = "block" ;
            num(++rr)

            if(ww == (listItems.length - 1) ){
            nextButton.onclick = function() { mino() };
            nextButton.innerHTML = "عرض أقل"
             
             nextButton.style.background = '#ff5a00'
            }
          }


    }

function num(mm) {
  if(mm > listItems.length){
    let sadasd = listItems.length
    return sadasd

  }else{
    let sadasd = mm 
    return sadasd

  }
}
function mino(){
listItems.forEach((tab)=>{
tab.style.display = "none"
})
for (let index = 0; index < 8 ; index++) {
  listItems[index].style.display = "block"
}
            nextButton.onclick = function() { xo() };
            nextButton.style.background = ''
            nextButton.innerHTML = "عرض المزيد"
            document.getElementById("bbb").scrollIntoView();

}


</script>

















<!-- <script type='text/javascript'>
var sess = document.cookie
console.log(sess)
</script> -->

</body>
</html>