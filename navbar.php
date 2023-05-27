
<style>
      


.a{
  width: 45px;
  height: 45px;
  z-index: 998;
  position: absolute;
  background-image:conic-gradient(rgb(24, 34, 44) , red);

  transition:transform 2225s;
  border-radius: 50%;

}
.n{
  width: 39px;
  height: 39px;
  z-index: 999;
  font-size: 20px;
  text-align: center;
  color: rgb(0, 0, 0);
  position: absolute;
  background-color:rgb(255, 255, 255);

  border-radius: 50%;
  margin-left: 3px;
  margin-top: 3px;

  border: rgb(24, 34, 44) 3px solid;
}
body:hover .a{
  transform: rotate(1000000deg);
}
#khra{
top: 0px ;
background-color:red;


}
    </style>
</head>
<body >
<div style="height:65px ;"></div>





<div class="offcanvas offcanvas-end " id="demo">
  

  <div class="offcanvas-header">
      <h1 class="offcanvas-title text-center d-block mx-auto ">LOGIN</h1>
  </div>
  <div class="offcanvas-body">
      <?php 

      if(isset($_SESSION['Close'])){
        echo '  
        
        <a href="logout.php" class="rounded-pill main-btn fs-5 d-block mx-auto text-center">تسجيل الخروج</a>';
        $none = '';
      }else{
        $none = 'x';
      }
       ?>
    <form action="index.php" method="POST" style="<?php
      if(empty($none)){
        echo 'display:none';
      }else{
        echo 'display:block';  

      }
      ?>">
      <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-12">
          <input type="email" class="form-control " id="inputEmail3" name="email" value="<?php if(isset($_COOKIE["Email"])){echo $_COOKIE["Email"];}?>">
        </div>
      </div>  

      <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label " >password</label>
        <div class="col-sm-12">
          <input type="password" class="form-control" id="inputPassword3" name="password" value="<?php if(isset($_COOKIE["password"])){echo $_COOKIE["password"];}?>" >
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-sm-10 ">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="check" id="gridCheck1">
            <label class="form-check-label" for="gridCheck1">
              Remember Me
            </label>
          </div>
        </div>
      </div>
      <button type="submit" style="width:100%;" title="تسجيل الدخول" class=" fw-bold btn rounded-pill main-btn d-grid fs-5 py-2" name="submit">Login</button>
      <hr>

      <h3 class="text-center my-5 pt-2 fw-bold" >or</h3>

      <a href="sing.php" title="إنشاء حساب جديد" class=" fw-bold btn btn-primary rounded-pill d-grid fs-5 mt- py-2" >Create a new account</a>

    </form>


  </div>
</div>


     <!--navbar-start-->
     
 <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: var(--nav);">
    <div class="container">
        <a href="index.php" class="navbar-brand  "><img src="img/ok.png" alt="..." style="object-fit:cover;width: 100px;height: 42px" ></a>
       

        
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" collapse navbar-collapse " id="collapse">
            <ul class="navbar-nav ms-auto nono" >
              <!-- <div class="me-5">
                <li class="nav-item "><a target="black" href="https://drive.google.com/drive/folders/1e1T3NcRr0BRKz37w0xcr8ulXdJtNyFT8" id="khra" class="nav-link p-0 pe-5"><div class="a p-0 m-0"></div><div class="n p-0">Js</div></a></li>
                <li class="nav-item"><a href="#" class="nav-link p-3">   </a></li>
              </div> -->

                <li class="nav-item"><a href="index.php" class="nav-link px-3 " >Home</a></li>
                <li class="nav-item"><a href="index.php#asd" class="nav-link px-3 " >members</a></li>
                <li class="nav-item"><a href="PHPMailer.php" class="nav-link px-3 me-3">Contact</a></li>
            </ul>
            <div class="input-group input-group-sm  " style="width: 300px; border-radius: 50% ;">
                <button class="btn bg-white" type="submit" id="button-addon1"style=" border-radius: 10px 0 0 10px; " data-bs-toggle="collapse" data-bs-target="#collapse"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                                <input id="search" type="search" dir="rtl" style=" border-radius: 0 10px 10px 0 "class="form-control form-control-sm" placeholder=" Search ">
                <button class=" rounded-pill main-btn p-2 py-1 ms-3 fw-bold "style=" width: 100px;max-height: 33px ;overflow: hidden;" data-bs-toggle="offcanvas" data-bs-target="#demo"><?php
                  if(isset($_SESSION['Close'])){
                    
                    
                    if(isset($_SESSION['Name'])){
                      $Login = $_SESSION['Name'];
                      echo $Login ;
                    };
                    if(empty($_SESSION['Name'])){
                      echo "Signed in";
                    }

                  }else{
                    echo "Login";
                  }?></button>

            </div>
            
            
            

        </div>
    </div>
</nav>
 <!--navbar-end-->
<script>

let nono = document.querySelectorAll('.nono');
nono.forEach(button => {
    button.addEventListener('click', function() {
        button.forEach(btn => btn.classList.remove('ctive'));
        this.classList.add('ctive');
    })
})

</script>
</html>
