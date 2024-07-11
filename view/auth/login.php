<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Form Design</title>
      <link rel="stylesheet" href="../css/auth.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Login Form
         </div>
         <form action="/eshopper-shoppingcart/index.php?act=dangnhap" method="POST">
            <div class="field">
               <input type="email" name="user" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" name="password" required>
               <label>Password</label>
            </div>
            <div style="padding: 10px 10px;">
            <?php if(isset($_GET['error2'])){
                  echo "Tài khoản hoặc mật khẩu sai!";
               } ?>
            </div>
            <div style="padding-left: 10px;">
            <?php if(isset($_GET['error'])){
                  echo "Tài khoản không tồn tại!";
               } ?>
            </div>
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" name="dangnhap" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="register.php">Signup now</a>
            </div>
         </form>
      </div>
   </body>
</html>