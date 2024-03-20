<?php
session_start();
include 'cn.php'; 
if(isset($_SESSION['session'])){
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Login</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/asset/css/login-style.css">
    <!--Stylesheet-->
     <!-- link sweet alert -->
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
    <style media="screen">
     
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <?php
        if(isset($_REQUEST['btnLogin'])){
          $code = $conn->real_escape_string($_REQUEST['code']);
          $password = $conn->real_escape_string($_REQUEST['password']);
          $sql = "SELECT * FROM `tbl_user` WHERE code='$code'";
          $qr = $conn->query($sql);
          $row = $qr->fetch_assoc();
          // if ($row && password_verify($password, $row['password'])) {
            if(!empty($row)){
            $_SESSION['session'] = $row['id'];
            header("location: index.php");
          }
                else{
                  echo '
                  <script>
                    swal({
                      title: "Try again",
                      text: "Incorrect Password OR Username",
                      icon: "error",
                    });
                  </script>
                  ';
                }
            }
            
        
      
      ?>
      
    <form method="post">
        <h3>Login Here</h3>

        <label for="username">User Code</label>
        <input type="text" placeholder="User code" id="code" name="code">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">

        <button type="submit" name="btnLogin">Log In</button>
        <div class="social">
          <div class="go"><i class="fab fa-google"></i>  Google</div>
          <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
        </div>
    </form>
</body>
</html>
