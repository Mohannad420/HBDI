<?php
session_start();
require_once 'navbar.php';

require_once "vendor/autoload.php";



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST["submit"])){
    // جلب بيانات من المستخدم
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];
    // ضبط عملية التحقق من السيرفر
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true ;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    // معلومات السيرفر
$mail->Host ="smtp-relay.sendinblue.com";
$mail->Port = 587;
    // معلومات المرسل و المرسل اليه
$mail->Username = "xilivone@gmail.com" ;
$mail->Password = "fFwSLQVp2hM5RHG1";
$mail->setFrom($email,$name);
$mail->addAddress("mohannadshawakh@gmail.com");
$mail->Subject = $subject ;
$mail->Body = $message ;
$mail->send();

}


/*

# قم بطباعة نتيجة العمليات الحسابية على المتغيرين التاليين -1 
$num1 = 10;
$num2 = 2;
# جمع, ضرب, طرح, قسمة. 
echo  $num1 + $num2 . '<br>' ;
echo  $num1 * $num2 . '<br>' ;
echo  $num1 - $num2 . '<br>' ;
echo  $num1 / $num2 . '<br>' ;

# قم بجلب نوع المتغيرات التالية واطبع النوع -2 

$var1 = 'Hello World!';
$var2 = 1977;
$var3 = true;
echo gettype($var1) . '<br>' ;
echo gettype($var2) . '<br>' ;
echo gettype($var3) . '<br>' ;

# عرف المتغير التالي -3 
$spanContent = 'Hello from PHP';
/* <span><?php echo $spanContent ?></span> */
/*
# 4- قم بطباعة مايلي باستخدام قيمة المتغير.
$vName = 'Sarah';
echo 'Hello ' . $vName ;

# قم بطباعة الجملة التالية ثالث مرات باستخدام جملة التكرار -5 

for($i=0;$i<3;$i++){
    echo '<br>' . 'Hello from PHP';
};
echo "<br>";
for($i=0;$i<3;$i++){
    echo 'Hello'.$i;

};
# لدينا المصفوفة التالية-7 
$vNames = ['Ali','Farah','Yazan'];
foreach($vNames as $items){
    echo '<span class='. $items. '></span>';
};

echo '<br>';

$vNum1 = 70;
$vNum2 = 20;
$vResults = ['True', 'False'];
if(($vNum1 - $vNum2) + 50 != 100){
    echo $vResults[0];
}else{
    echo $vResults[1];
};

echo '<br>';

$vFalse = 'PHP is frontEnd language';
$vTrue = 'PHP is backEnd language';
if($vTrue == $vFalse && $vFalse !== 'PHP is backEnd language'){
echo $vTrue;
}else if($vTrue != $vFalse || $vTrue !== 'PHP is backEnd language'){
echo $vTrue . ' okkkkk';
}else{
echo $vTrue;
};

function plas($no=0,$on=0){
echo $no + $on ;
}
 
plas();

$vString = '7';
$vNumber = 7;

settype($vString,'int');

if($vString === $vNumber){
echo '<br>True';
}else{
    echo '<br>fulse';
}



*/
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
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

   <title>index</title>
    <link rel="stylesheet" href="css00.css">
</head>
<body style="background-color:var(--sec);">

<!-- Wrapper container -->
<div class="container-fluid d-flex justify-content-center align-items-center row  py-4">
  <!-- Bootstrap 5 starter form -->
  <form id="contactForm " action="PHPMailer.php" method="POST" class="col-11 col-sm-8 col-lg-6 ">

    <!-- Name input -->
    <div class="mb-3">
      <label class="form-label" for="name">Name</label>
      <input class="form-control" id="name" type="text" placeholder="Name" name="name" data-sb-validations="required"  
      value="<?php 
      if(isset($_SESSION['Name'])){
        echo $_SESSION['Name'];
      }
      ?>" />
      <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
    </div>

    <!-- Email address input -->
    <div class="mb-3">
      <label class="form-label" for="emailAddress">Email Address</label>
      <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" name="email" data-sb-validations="required, email" 
      value="<?php 
      if(isset($_COOKIE["Email"])){
        echo $_COOKIE["Email"];
      }
      ?>" />
      <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
      <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
    </div>

    <div class="mb-3">
      <label class="form-label" for="subject">subject</label>
      <input class="form-control" id="name" type="text" placeholder="subject" name="subject" data-sb-validations="required"/>
      <div class="invalid-feedback" data-sb-feedback="subject:required">subject is required.</div>
    </div>

    <!-- Message input -->
    <div class="mb-3">
      <label class="form-label" for="message">Message</label>
      <textarea class="form-control" id="message" type="text" placeholder="Message" name="message" style="height: 10rem;" data-sb-validations="required"></textarea>
      <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
    </div>

    <!-- Form submissions success message -->
    <div class="d-none" id="submitSuccessMessage">
      <div class="text-center mb-3">Form submission successful!</div>
    </div>

    <!-- Form submissions error message -->
    <div class="d-none" id="submitErrorMessage">
      <div class="text-center text-danger mb-3">Error sending message!</div>
    </div>

    <!-- Form submit button -->
    <div class="d-grid">
      <button class="btn btn-primary main-btn btn-lg fw-bold fs-5" name="submit" type="submit">Send Email</button>
    </div>

  </form>

</div>
</body>
</html>