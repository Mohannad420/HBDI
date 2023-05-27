<?php
session_start();

include 'connect.php';

if(!isset($_SESSION['Email'])){
    header('location:index.php');
}
$srcEmail = $_SESSION['Email'];

if(isset($_COOKIE['countsA'])){

  $conn = mysqli_connect('localhost','root','','hdmi-pro');
  $stm = "SELECT * FROM users WHERE email = '$srcEmail'";

  $check = mysqli_query($conn , $stm);
  $result = mysqli_fetch_assoc($check);

  if(!$result){
      $salh = 'لا يوجد حساب بهذا الاسم';

  }else{
      $countsA = $_COOKIE['countsA'];
      $countsB = $_COOKIE['countsB'];
      $countsC = $_COOKIE['countsC'];
      $countsD = $_COOKIE['countsD'];

      $stm = "UPDATE `users` SET `countsA` = '$countsA', `countsB` = '$countsB', `countsC` = '$countsC', `countsD` = '$countsD' WHERE `users`.`email` = '$srcEmail'";
      $conn->prepare($stm)->execute();




        // header ('location:index.php');

    

  }
}









?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="https://www.symbols.com/images/symbol/1/270_registered-trademark-symbol.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="css00.css">

    <title>HBDI</title>

    <style>
 
      .circle {
  width: 200px;
  height: 200px;
  border-radius: 50%;
  background-color: red;
  position: relative;
}
.horizontal {
  position: absolute;
  top: 50%;
  left: 0;
  width: 100%;
  height: 1px;
  background-color: black;
  z-index: 10;
}
.horizontal2{
  position: absolute;
  top: 50%;
  left: 0;
  width: 100%;
  height: 1px;
  background-color: black;
  transform: rotate(45deg);
  z-index: 10;

}
.vertical2{
  position: absolute;
  top: 50%;
  left: 0;
  width: 100%;
  height: 1px;
  background-color: black;
  transform: rotate(135deg);
  z-index: 10;


}
.vertical {
  position: absolute;
  left: 50%;
  top: 0;
  height: 100%;
  width: 1px;
  background-color: black;
  z-index: 10;
}
.da7ra{
          height: 70px;
          width: 70px;
          border : 1px black solid ;
          position: absolute;
          border-radius: 50%;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          background:#ffffff38;
          
}
.trans{
          height: 140px;
          width: 140px;
          border : 1px black solid ;
          position: absolute;
          border-radius: 50%;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          background:#ffffff38;

}



        body{
            background-image: linear-gradient(rgb(0 0 0 / 25%),white);
            height:100vh;
                /* font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; */

        }
        #A , #B , #C , #D {
            font-weight: 700;
            font-size: large;
            color:black;
            height: 34px;

        }

        tbody, td, tfoot, th, thead, tr {
            border-width :3px !important ;
            
        }
        input[type=radio]{
            padding: 9px;
            margin-bottom:8px ;
            cursor: pointer;

        }
        label{
            cursor: pointer;

        }
        @media screen and (max-width:540px){
            .A{
            margin-right: 3px;            }
            
            .form-check {        
                display: flex;
                flex-direction: column-reverse;
                padding :0px;
                margin-left: 0px !important;
                
            }
            .form-check-input{
                                margin-left: 0px !important;

            }
            label{
                transform: scale(1.2);
                text-align:center;
                
            }
            .pe-0{
                padding-right: 8px!important;
            }

        }
        @media screen and (max-width:765px){
    
          #dis{
                      overflow: auto;
                      height: 90vh;
                    }

          #A , #B , #C , #D {
            font-weight: 800;
            font-size: small;
            color: black;
            height: 32px;
                  }


        }
        @media screen and (min-width:540px){
            b{
                padding-top: 11px !important;
                padding-bottom: 12px !important;
                padding-left: 15px !important;
                padding-right: 20px !important;
                cursor: pointer;
            }
        }
        #grad1 {
          height: 200px;
          width: 200px;
          background-color: red; /* For browsers that do not support gradients */
          background-image: conic-gradient(#ffff7e 0deg, yellow 90deg, #ff6969 90deg, red 180deg,red 0deg, red 90deg, #6dff6d 180deg, green 270deg, #6363ff 270deg ,blue 360deg);          border-radius: 50%;
          outline : 2px black solid ;
          position: relative;

        }

    </style>
  
</head>
<body>

<?php
 require_once 'navbar.php' 
?>

<div id="body" dir="rtl" class="container-fluid container-md d-flex justify-content-center px-0 mt-5 ">

    <div class="col-12 col-lg-8  text-center ">
        <form action="index.php" method="post"  
onclick="
if(z1.style.display == 'block'){
z1.style.display = 'none'
}
">
        <div class="progress w-100  " style="border-radius: 0px;">
            <div class="progress-bar bg-primary progress-bar-animated progress-bar-striped text-dark" id="gg" role="progressbar" style="width:0%; " aria-valuenow="50"                            aria-valuemin="0" aria-valuemax="100">50%</div>
        </div>

            <table class=" table table-dark table-striped ">

                <thead class="d-stcky top-0 ">
                    <tr class="text-center "   >
                        <th width="4%">#</th>
                        <th  width="83%">السؤال</th>
                        <th width="6.5%">نعم</th>
                        <th width="6.5%">لا</th>
                    </tr>
                </thead>
                
                <tbody >

<?php
// for($i = 1 ; $i <= 56 ; $i++){
//     echo '                    <!-- السؤال '.$i.' -->
//     <tr id="ids">               
//         <th class="pb-1 text-center ">'.$i.'</th>

//         <td class="pb-1 text-center ">what is your name ?</td>

//          <td class="pb-1 pe-0 ">
//             <div class="form-check">
//                 <input class="form-check-input"required type="radio" name="A'.$i.'" id="flexRadioDefault'.$i.'" value="yesA">
//                 <label class="form-check-label text-info " for="flexRadioDefault'.$i.'">
//                     <b>نعم</b>
//                 </label>
//               </div>

//         </td>
//          <td class="pb-1 pe-0 ">
//             <div class="form-check ">
//                 <input class="form-check-input  " required type="radio" name="A'.$i.'" id="flexRadioDefault'.$i.'"  value="no">
//                 <label class="form-check-label text-warning    " for="flexRadioDefault'.$i.'">
//                   <b>لا</b>
//                 </label>
//               </div>

//         </td>
//     </tr>';
// }
?>            
                    
                    
                    <!-- السؤال 1 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">1</th>

        <td class="pb-1 text-center ">أمتلك معرفه مميزة بالمواضيع العلمية والتقنية</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A1" id="flexRadioDefault1" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault1">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A1" id="flexRadioDefaultw1"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefaultw1">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 2 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">2</th>

        <td class="pb-1 text-center ">أعتبر نفسي عطوفا ولطيفا وآنس بالآخرين وأساعدهم متى احتاجوا</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A2" id="flexRadioDefault2" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault2">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A2" id="flexRadioDefault2x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault2x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 3 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">3</th>

        <td class="pb-1 text-center ">أحب العمل في اكثر من شيء في وقت واحد</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A3" id="flexRadioDefault3" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault3">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A3" id="flexRadioDefault3x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault3x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 4 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">4</th>

        <td class="pb-1 text-center ">أراقب وجوه الاخرين لا إراديآ عندما يتحدثون الي</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A4" id="flexRadioDefault4" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault4">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A4" id="flexRadioDefault4x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault4x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 5 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">5</th>

        <td class="pb-1 text-center ">كثيرآ ما تراودني الأفكار الجديدة و المميزة</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A5" id="flexRadioDefault5" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault5">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A5" id="flexRadioDefault5x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault5x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 6 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">6</th>

        <td class="pb-1 text-center ">لا احب ان يقاطع أحد نمطي الروتيني</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A6" id="flexRadioDefault6" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault6">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A6" id="flexRadioDefault6x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault6x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 7 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">7</th>

        <td class="pb-1 text-center ">اشعر بارتياح اثناء أدائي لأعمال التصنيف والترتيب والتنظيم</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A7" id="flexRadioDefault7" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault7">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A7" id="flexRadioDefault7x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault7x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 8 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">8</th>

        <td class="pb-1 text-center ">أهتم عادة بالصورة العامة ولا ادقق في التفاصيل</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A8" id="flexRadioDefault8" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault8">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A8" id="flexRadioDefault8x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault8x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 9 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">9</th>

        <td class="pb-1 text-center ">أعتقد ان العمل اهم بكثير من المشاعر الإنسانية</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A9" id="flexRadioDefault9" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault9">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A9" id="flexRadioDefault9x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault9x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 10 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">10</th>

        <td class="pb-1 text-center ">يفضل الإخرون ان أتولى زمام القيادة</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A10" id="flexRadioDefault10" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault10">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A10" id="flexRadioDefault10x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault10x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 11 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">11</th>

        <td class="pb-1 text-center ">ادون التزاماتي الاجتماعية في مفكرتي الخاصة وأحرص ع القيام بها</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A11" id="flexRadioDefault11" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault11">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A11" id="flexRadioDefault11x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault11x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 12 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">12</th>

        <td class="pb-1 text-center ">اتمتع بروح الدعابة التي قد توقعني في مشاكل </td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A12" id="flexRadioDefault12" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault12">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A12" id="flexRadioDefault12x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault12x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 13 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">13</th>

        <td class="pb-1 text-center ">أميل في حكمي على الأشياء على حدسي وتوقعاتي أكتر من ميلي إلى التحليل</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A13" id="flexRadioDefault13" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault13">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A13" id="flexRadioDefault13x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault13x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 14 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">14</th>

        <td class="pb-1 text-center ">افضل تعليمات محددة على ان يترك الامر بلا تعليمات محددة وواضحة</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A14" id="flexRadioDefault14" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault14">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A14" id="flexRadioDefault14x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault14x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 15 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">15</th>

        <td class="pb-1 text-center ">يصفني الناس بأني عاطفي</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A15" id="flexRadioDefault15" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault15">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A15" id="flexRadioDefault15x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault15x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 16 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">16</th>

        <td class="pb-1 text-center ">يصفني الناس بأني حريص "أو" حذر "او" منظبط</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A16" id="flexRadioDefault16" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault16">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A16" id="flexRadioDefault16x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault16x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 17 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">17</th>

        <td class="pb-1 text-center ">يصفني الناس بأني مغامر</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A17" id="flexRadioDefault17" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault17">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A17" id="flexRadioDefault17x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault17x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 18 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">18</th>

        <td class="pb-1 text-center ">يصفني الناس باني حازم "او" عقلاني </td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A18" id="flexRadioDefault18" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault18">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A18" id="flexRadioDefault18x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault18x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 19 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">19</th>

        <td class="pb-1 text-center ">أحب معرفة التفاصيل وخطواط اي عمل سأقوم به</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A19" id="flexRadioDefault19" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault19">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A19" id="flexRadioDefault19x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault19x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 20 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">20</th>

        <td class="pb-1 text-center ">لا احب الأنظمة والقوانين وأشعر انها تقيدني</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A20" id="flexRadioDefault20" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault20">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A20" id="flexRadioDefault20x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault20x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 21 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">21</th>

        <td class="pb-1 text-center ">أحب الشعر "أو" الروايات "أو" التواصل مع الآخرين</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A21" id="flexRadioDefault21" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault21">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A21" id="flexRadioDefault21x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault21x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 22 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">22</th>

        <td class="pb-1 text-center ">أشعر بأنه يجب تنفذ القوانين والعقوبات بحزم بدون عواطف و مجاملات</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A22" id="flexRadioDefault22" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault22">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A22" id="flexRadioDefault22x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault22x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 23 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">23</th>

        <td class="pb-1 text-center ">لا أحب الاشياء المحتملة أو التي لا يمكن توقع نتائجها</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A23" id="flexRadioDefault23" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault23">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A23" id="flexRadioDefault23x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault23x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 24 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">24</th>

        <td class="pb-1 text-center ">أحب مساعدة الآخرين وأعطائهم من وقتي ومالي وجهدي</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A24" id="flexRadioDefault24" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault24">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A24" id="flexRadioDefault24x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault24x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 25 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">25</th>

        <td class="pb-1 text-center ">أحب التخطيط المفصل لأي عمل سأقوم به</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A25" id="flexRadioDefault25" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault25">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A25" id="flexRadioDefault25x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault25x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 26 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">26</th>

        <td class="pb-1 text-center ">عند شرائي لجهاز جديد أحاول تشغيله بنفسي دون اللجوء الى كتيب التشغيل</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A26" id="flexRadioDefault26" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault26">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A26" id="flexRadioDefault26x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault26x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 27 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">27</th>

        <td class="pb-1 text-center ">أحي الاستماع لمشاكل الآخرين ومساعدتهم </td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A27" id="flexRadioDefault27" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault27">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A27" id="flexRadioDefault27x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault27x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 28 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">28</th>

        <td class="pb-1 text-center ">لدي القدره في التعامل مع الأرقام "او" الحسابات</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A28" id="flexRadioDefault28" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault28">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A28" id="flexRadioDefault28x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault28x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 29 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">29</th>

        <td class="pb-1 text-center ">حرصي على الدقة والحقائق قد يجعلني في نظر الاخرين جاف المشاعر</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A29" id="flexRadioDefault29" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault29">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A29" id="flexRadioDefault29x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault29x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 30 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">30</th>

        <td class="pb-1 text-center ">أعمل مع الآخرين عن طيب نفس من اجل هدف مشترك</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A30" id="flexRadioDefault30" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault30">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A30" id="flexRadioDefault30x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault30x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 31 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">31</th>

        <td class="pb-1 text-center ">أدرك الأرقام وأعي دلالاتها ولي القدرة على حسابها وتسخيرها لما أرغب</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A31" id="flexRadioDefault31" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault31">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A31" id="flexRadioDefault31x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault31x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 32 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">32</th>

        <td class="pb-1 text-center ">لدي القدرة على توقع احتياجات الآخرين ومن ثم مراعاتها</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A32" id="flexRadioDefault32" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault32">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A32" id="flexRadioDefault32x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault32x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 33 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">33</th>

        <td class="pb-1 text-center ">ادرك الكثير من الاشياء بالحدث والبديهة دون التفكير العميق فيها</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A33" id="flexRadioDefault33" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault33">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A33" id="flexRadioDefault33x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault33x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 34 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">34</th>

        <td class="pb-1 text-center ">حذر وحريص وأهتم بالعواقب كثيرآ</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A34" id="flexRadioDefault34" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault34">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A34" id="flexRadioDefault34x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault34x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 35 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">35</th>

        <td class="pb-1 text-center ">أجمل اللحظات هي التي اسعد فيها الآخرين </td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A35" id="flexRadioDefault35" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault35">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A35" id="flexRadioDefault35x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault35x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 36 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">36</th>

        <td class="pb-1 text-center ">اتحمس للأهداف واكرس لها وقتي وجهدي كله</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A36" id="flexRadioDefault36" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault36">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A36" id="flexRadioDefault36x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault36x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 37 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">37</th>

        <td class="pb-1 text-center ">استطيع ان احدد سبب المشكلة عند حدوثها واحللها ثم أجد لها الحل المناسب</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A37" id="flexRadioDefault37" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault37">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A37" id="flexRadioDefault37x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault37x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 38 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">38</th>

        <td class="pb-1 text-center ">لا يمكن ان اصبر ع الفوضى بل ارتب وانظم كل الامور والاشياء الخاصة والعامة</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A38" id="flexRadioDefault38" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault38">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A38" id="flexRadioDefault38x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault38x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 39 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">39</th>

        <td class="pb-1 text-center ">لدي القدرة على تنمية العلاقات مع الاخرين والمحافظة عليها والتواصل معها</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A39" id="flexRadioDefault39" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault39">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A39" id="flexRadioDefault39x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault39x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 40 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">40</th>

        <td class="pb-1 text-center ">المال عندي للانفاق ويصعب علي جمعه </td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A40" id="flexRadioDefault40" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault40">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A40" id="flexRadioDefault40x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault40x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 41 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">41</th>

        <td class="pb-1 text-center ">لست بخيلآ ولكني لا انفق شيء من مالي إلا بعد تحليل ودراسة متأنية</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A41" id="flexRadioDefault41" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault41">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A41" id="flexRadioDefault41x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault41x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 42 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">42</th>

        <td class="pb-1 text-center ">أكره الروتين وأحب التغير دائمآ</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A42" id="flexRadioDefault42" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault42">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A42" id="flexRadioDefault42x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault42x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 43 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">43</th>

        <td class="pb-1 text-center ">أحافظ على أغراضي وممتلكاتي بطريقة منظمة ومرتبة</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A43" id="flexRadioDefault43" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault43">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A43" id="flexRadioDefault43x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault43x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 44 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">44</th>

        <td class="pb-1 text-center ">يقول بعض الناس عني "أنت مندفع ولا يمكن توقع افعالك" غالبآ</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A44" id="flexRadioDefault44" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault44">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A44" id="flexRadioDefault44x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault44x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 45 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">45</th>

        <td class="pb-1 text-center ">أعتبر نفسي أسير بوضوح إلى هدفي الذي قررته</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A45" id="flexRadioDefault45" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault45">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A45" id="flexRadioDefault45x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault45x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 46 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">46</th>

        <td class="pb-1 text-center ">انفذ الأمور بدقة دائمآ خطوة بخطوة واتمتع بالدقة في عملي</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A46" id="flexRadioDefault46" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault46">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A46" id="flexRadioDefault46x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault46x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 47 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">47</th>

        <td class="pb-1 text-center ">اعتبر ان علاقتي الطيبة مع الآخرين هي أعز ما أملك </td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A47" id="flexRadioDefault47" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault47">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A47" id="flexRadioDefault47x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault47x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 48 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">48</th>

        <td class="pb-1 text-center ">أميل للفعل أكثر من ميلي للتأمل والتفكير والتنظير</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A48" id="flexRadioDefault48" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault48">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A48" id="flexRadioDefault48x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault48x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 49 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">49</th>

        <td class="pb-1 text-center ">مستعد للخدمة وتقديم نفسي للآخرين متى احتاجوا الى ذلك</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A49" id="flexRadioDefault49" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault49">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A49" id="flexRadioDefault49x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault49x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 50 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">50</th>

        <td class="pb-1 text-center ">أجد نفسي أفكر وأستنتج بعيدآ عن العاطفة والمشاعر</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A50" id="flexRadioDefault50" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault50">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A50" id="flexRadioDefault50x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault50x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 51 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">51</th>

        <td class="pb-1 text-center ">يعتمد علي الآخرون ويثقون في انجازي وإخلاصي</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A51" id="flexRadioDefault51" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault51">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A51" id="flexRadioDefault51x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault51x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 52 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">52</th>

        <td class="pb-1 text-center ">أحب التحدث مع الآخرين عن مشاعري وقصصي</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A52" id="flexRadioDefault52" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault52">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A52" id="flexRadioDefault52x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault52x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 53 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">53</th>

        <td class="pb-1 text-center ">تستهويني الأفكار غير الاعتيادية والتي يسميها الاخرون أفكار مجنونة</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A53" id="flexRadioDefault53" value="yesD">
                <label class="form-check-label text-info " for="flexRadioDefault53">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A53" id="flexRadioDefault53x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault53x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 54 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">54</th>

        <td class="pb-1 text-center ">لدي قدرة عالية على تعليل الأحداث واستنتاج آثارها المنطقية</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A54" id="flexRadioDefault54" value="yesA">
                <label class="form-check-label text-info " for="flexRadioDefault54">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A54" id="flexRadioDefault54x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault54x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 55 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">55</th>

        <td class="pb-1 text-center ">لدي القدرة على مواصلة العمل حتى إنجازه</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required type="radio" name="A55" id="flexRadioDefault55" value="yesB">
                <label class="form-check-label text-info " for="flexRadioDefault55">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A55" id="flexRadioDefault55x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault55x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>                    <!-- السؤال 56 -->
    <tr id="ids">               
        <th class="pb-1 text-center ">56</th>

        <td class="pb-1 text-center ">أجيد بث الحماس في همم الآخرين</td>
        
         <td class="pb-1 pe-0 ">
            <div class="form-check">
                <input class="form-check-input"required onchange="" type="radio" name="A56" id="flexRadioDefault56" value="yesC">
                <label class="form-check-label text-info " for="flexRadioDefault56">
                    <b>نعم</b>
                </label>
              </div>

        </td>
         <td class="pb-1 pe-0 ">
            <div class="form-check ">
                <input class="form-check-input  " required type="radio" name="A56" id="flexRadioDefault56x"  value="no">
                <label class="form-check-label text-warning    " for="flexRadioDefault56x">
                  <b>لا</b>
                </label>
              </div>

        </td>
    </tr>            
                    
   
   
                   
                </tbody>
            </table>
            <div  style="display:none; " id="z1" class=" fw-bold alert alert-danger alert-dismissible fade show mx-auto px-0 "                      role="alerta">
                <strong id="z2" >Holy guacamole!</strong><a href="#" id="z3" class="fw-bold" >
                  <!--<strong> اضعط هنا للذهاب الى السؤال </strong> -->
                  </a>
                
            </div>


        </form>

            <button id="next" type="button" class="btn btn-primary mt-3  mt-md-2 fw-bold w-25 mb-5 " onclick="xo() ;"> التالي</button>

            <button id="btnn" class="btn btn-primary fw-bold mb-3 px-5 py-2 w-100 " style="" onclick="
        
        count();

        ">
                
                <h3 class="d-inline mb-2 px-2">ابدأ تحليل الشخصية</h3>

            </button>
    </div>
</div>

<div id="dis" class="container bg-dark px-sm-5 p-4 mb-4 text-center pb-5 mt-2 " style="position: fixed; left:0.1px; right: 0.1px; top:10vh;margin-bottom:5vh;display:none;">
    <h3 id="h1" class="text-center text-primary  mt-1">_  النتائج النهائية  _</h3>
    <h5  id="h2" class="text-center text-secondary   mt-4 mb-5">mogg/dgdsg/dfgfd/dfg</h5>

    <div class="container-fluid p-0 m-0 row">

      <div class="container-fluid p-0 m-0 col-md-8 mb-2">
        <code><h4>A / عقلاني</h4></code>
        <div class="progress mb-2 mt-1 my-1 " style="height:10%;">
            <div class="progress-bar bg-praimry progress-bar-striped progress-bar-animated" id="A" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">X</div>
        </div>

        <code><h4>B / تنفيذي</h4></code>
        <div class="progress mb-2 mt-1 my-1 " style="height:10%;">
            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" id="B" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">X</div>
        </div>

        <code><h4>C / عاطفي</h4></code>
        <div class="progress mb-2 mt-1 my-1 " style="height:10%;">
            <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" id="C" role="progressbar" style="width: 0%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">X</div>
        </div>

        <code><h4>D /  إبداعي</h4></code>
        <div class="progress mb-2 mt-1 my-1 " style="height:10%;">
            <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" id="D" role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">X</div>
        </div>
      </div>
    

    <!-- // دائر البيانات -->
    <div class="container-fluid d-flex justify-content-center align-items-center col-md-4 p-0">



      <div style="position: relative;" id="grad1" class="ms-0 ms-md-4"> 
      

        <h3 class=" mb-0" style="  transform: translate(0px,-10px); left:0; position: absolute ;display: inline; font-size: xx-large;  text-shadow: 2px 2px 5px blue ;color:black;font-weight: 700; ">A</h3>
        <h3 class=" mb-0" style=" transform: translate(0px,6px);bottom:0px; position: absolute ;display: inline; font-size: xx-large;  text-shadow: 2px 2px 5px green ;color:black;font-weight: 700; ">B</h3>
        <h3 class="mb-0" style="  transform: translate(0px,6px);right:0px ;bottom:0px; position: absolute;display: inline; font-size: xx-large; text-shadow: 2px 2px 5px red;color:black;font-weight: 700; ">C</h3>
        <h3 class="mb-0" style="  transform: translate(0px,-10px); right:0px ; position: absolute;display: inline; font-size: xx-large; text-shadow: 2px 2px 5px #ffbf00 ;color:black;font-weight: 700; ">D</h3>



        <div class=" trans"></div>     
        <div class="da7ra"></div>  
        <div class="horizontal2"></div>
        <div class="vertical2"></div>   
        <div class="horizontal"></div>
        <div class="vertical"></div>

        <svg style="position: relative;transform: rotate(45deg); z-index: 10;" width="200" height="200">

          <path id="xaxa" d="M 0 100  L100 200  L200 100  L100 0  Z " fill="#47474784" stroke="#000" stroke-width="2" />

          <circle id="cc1" width="180" height="180" r="4" cx="0" cy="100" fill="#0dcaf0" stroke="#000" stroke="1"/>
          <circle id="cc2" width="180" height="180" r="4" cx="100" cy="200" fill="#0dcaf0" stroke="#000" stroke="1"/>
          <circle id="cc3" width="180" height="180" r="4" cx="200" cy="100" fill="#0dcaf0" stroke="#000" stroke="1"/>
          <circle id="cc4" width="180" height="180" r="4" cx="100" cy="0" fill="#0dcaf0" stroke="#000" stroke="1"/>

        </svg>
      </div>

  


    </div>
    <button type="button" class="btn btn-danger main-btn mt-5  mt-md-2 fw-bold " onclick="location.replace('index.php')"> الرجوع الى الصفحة الرئيسية</button>

</div>


<?php

?>





<script>
if(document.cookie.indexOf("ok=") != -1 ){

document.getElementById('body').style.opacity = 0.5 ;
    document.getElementById('dis').style.display = 'block' ;
    document.getElementById("btnn").disabled = true;  

     // ملئ النتائج النهائيه

     function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
      }

      countsA = parseFloat(getCookie("countsA"))

      countsB = parseFloat(getCookie("countsB"))

      countsC = parseFloat(getCookie("countsC"))

      countsD = parseFloat(getCookie("countsD"))
      
      // console.log(typeof(countsA))
      // console.log(countsB)
      // console.log(countsC)
      // console.log(countsD)



     let h1 = document.getElementById('h1')
     let h2 = document.getElementById('h2')
     
     // تحليل الشخصية الاساسية
     if(countsA >= countsB && countsA >= countsC && countsA >= countsD){
     // console.log('you are A ' + countsA)
     h1.innerHTML = ' _ ( <em>عقلاني</em> ) _<br>العقلية التحليلية' 
     h1.classList.add("text-primary");
     h2.innerHTML = 'التحليل / المنطق / الأرقام / التكنولوجيا' 
     
     }
     
     if(countsB >= countsA && countsB >= countsC && countsB >= countsD){
     // console.log('you are B ' + countsB)
     h1.innerHTML = ' _ ( <em>تنفيذي</em> ) _<br>العقلية التنفذية التنظيمية' 
     h1.classList.add("text-success");

     h2.innerHTML = 'الترتيب / التنظيم / التفاصيل / الإجراءات / التوجيه / الإدارة' 
     
     }
     
     if(countsC >= countsA && countsC >= countsB && countsC >= countsD){
     // console.log('you are C ' + countsC)
     h1.innerHTML = ' _ ( <em>عاطفي</em> ) _<br>العقلية الإنسانية العاطفية' 
     h1.classList.add("text-danger");

     h2.innerHTML = 'صنع العلاقات و رعايتها / الاهتمام بالآخرين / الإحتواء / التأثير في الآخرين ' 
     }
     
     if(countsD > countsA && countsD > countsB && countsD > countsC){
     // console.log('you are D ' + countsD)
     h1.innerHTML = ' _ ( <em>إبداعي</em> ) _<br> العقلية الإبداعية الحرة' 
     h1.classList.add("text-warning");
     
     h2.innerHTML = 'الخيال / المرونة / الإبداع / القدرة على الاستنتاج / الاهتمام بالقضاية الكبرى' 
     }
     
     // شريط التحميل
     let progA = document.getElementById('A')
     progA.style.width = countsA + '%' ;
     progA.innerHTML = countsA.toFixed() + '%'
     
     let progB = document.getElementById('B')
     progB.style.width = countsB + '%' ;
     progB.innerHTML = countsB.toFixed() + '%'
     
     let progC = document.getElementById('C')
     progC.style.width = countsC + '%' ;
     progC.innerHTML = countsC.toFixed() + '%'
     
     let progD = document.getElementById('D')
     progD.style.width = countsD + '%' ;
     progD.innerHTML = countsD.toFixed() + '%'
 

              // var path = document.querySelector('path')
              // var pathD = path.getAttribute('d')
              var dPath = " M " + (-countsA +100 )  + " 100 " + " L100 " + (countsB + 100) + " L " + (countsC + 100) + " 100 " + " L100 " + (-countsD + 100) + "Z"

              document.getElementById("xaxa").setAttribute("d", dPath);


              document.getElementById("cc1").setAttribute("cx", (-countsA + 100));
              document.getElementById("cc2").setAttribute("cy", (countsB + 100)  );
              document.getElementById("cc3").setAttribute("cx", (countsC + 100) );
              document.getElementById("cc4").setAttribute("cy", (-countsD + 100) );

}





var countsA = 0
var countsB = 0
var countsC = 0
var countsD = 0

var mohannad = 0 ;
var z1 = document.getElementById("z1")
var z2 = document.getElementById("z2")
var z3 = document.getElementById("z3")


function count(){
    var coco = 0;
    var srsr = 1 ;
    var noError = ''
    // كاشف ال Error
    var how = document.querySelectorAll('input[type="radio"')
    for(var forHow = 0 ; forHow < how.length ; forHow++ ){
        coco++

        if(how[forHow].checked == false && how[coco].checked == false ){
            z3.href = '#' + how[coco].id
            z2.innerHTML = " لم تجب على السؤال رقم " + srsr

            forHow = 1000 ;
            z1.style.display = 'block';

            noError = 'ERROR'
            // console.log(forHow)
            // console.log(coco)
          
        }

        forHow++
        coco++

        srsr++
    }

// زر بدا تحليل الشخصيه 
    if(srsr == 57){

        A();
        B();
        C();
        D();

      // <!-- // cookie ------------------------- -->

      document.cookie = "countsA=" + countsA ;
      document.cookie = "countsB=" + countsB ;
      document.cookie = "countsC=" + countsC ;
      document.cookie = "countsD=" + countsD ;        
      document.cookie = "ok=" + 'ok' ;        
      window.location.reload();
                

                
          
    }
} 


function A() {
    var as = []

    var A = document.querySelectorAll('input[value="yesA"');
    // console.log(A.length) // عدد الاسؤال
    for(var forA = 0 ; forA < A.length ; forA++ ){
        // console.log(A[forA].checked);

        as[forA] = [A[forA].checked];  

        if(A[forA].checked == true){
            countsA = countsA + 7.142857142857143 ;
        }
    }
    // console.log(as); // Array
    // console.log(countsA + " A");
}
function B() {
    var bs = []

    var B = document.querySelectorAll('input[value="yesB"');
    // console.log(B.length) // عدد الاسؤال
    for(var forB = 0 ; forB < B.length ; forB++ ){
        // console.log(B[forB].checked);

        bs[forB] = [B[forB].checked]; 

        if(B[forB].checked == true){
            countsB  = countsB + 7.142857142857143 ;
        }
    }
    // console.log(bs); // Array 
    // console.log(countsB + " B");
}
function C() {
    var cs = []

    var C = document.querySelectorAll('input[value="yesC"');
    // console.log(C.length) // عدد الاسؤال
    for(var forC = 0 ; forC < C.length ; forC++ ){
        // console.log(C[forC].checked);

        cs[forC] = [C[forC].checked]; 

        if(C[forC].checked == true){
            countsC  = countsC + 7.142857142857143 ;
        }
    }
    // console.log(cs); // Array 
    // console.log(countsC + " C");
}
function D() {
    var ds = []

    var D = document.querySelectorAll('input[value="yesD"');
    // console.log(D.length) // عدد الاسؤال
    for(var forD = 0 ; forD < D.length ; forD++ ){
        // console.log(D[forD].checked);

        ds[forD] = [D[forD].checked];  

        if(D[forD].checked == true){
            countsD = countsD + 7.142857142857143 ;
        }
    }
    // console.log(ds); // Array
    // console.log(countsD + " D");
}



const listItems = document.querySelectorAll("tr#ids");
const nextButton = document.getElementById("next");
var elementList = [...document.querySelectorAll("tr#ids")]

listItems.forEach((tab)=>{
tab.style.display = "none"
})
let rr = 16;
let ww;

for (let index = 0; index < 8 ; index++) {
  listItems[index].style.display = "table-row"
}


    var ggs = 0 ;

function xo() {
var R = num(rr);
var ww = num(rr - 8);
    var coc = -1;
    var coco2 = 0;
    var srsr2 = 1 ;
    var noError2 = ''
    let forHow2 = 0 ;
    // كاشف ال Error
    var how2 = document.querySelectorAll('input[type="radio"')
    for( let forHow2 = 0 ; forHow2 <= (ww * 2) ; forHow2++ ){
        coco2++

        if(how2[forHow2].checked == false && how2[coco2].checked == false ){
            z3.href = '#' + how2[coco2].id
            z2.innerHTML = " لم تجب على السؤال رقم " + srsr2

            forHow2 = 1000 ;
            z1.style.display = 'block';

            noError2 = 'ERROR'

        }
        coc++
        forHow2++
        coco2++

        srsr2++

 
          if(coc * 2 == ww * 2 ){
            z1.style.display = 'none';
            ggs = ggs + 14.28571428571429 ;
            document.getElementById("gg").style.width = ggs + '%' ;  
            document.getElementById("gg").innerHTML = ggs.toFixed() + '%' ;  

          for (let dd = 0 ; dd < ww ; dd++) {
            listItems[dd].style.display = "none" ;
          } 

          for (ww ; ww < R ; ww++) {
            listItems[ww].style.display = "table-row" ;
            num(++rr)
          }
          if(ww == 56){
            nextButton.style.display = 'none'
            document.getElementById("btnn").style.display = 'inline-block';  
          }
        }

    }

 










}



document.getElementById("btnn").style.display = 'none';  




function num(mm) {
  if(mm > 56){
    let sadasd = 56
    return sadasd

  }else{
    let sadasd = mm 
    return sadasd

  }
}

</script>




</body>
</html>