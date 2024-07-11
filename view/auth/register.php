<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Registration Form</title>
  <link rel="stylesheet" href="../css/auth.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="/eshopper-shoppingcart/index.php?act=dangky" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="username" placeholder="VD: Nguyễn Văn A" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone" placeholder="VD: 0123456789" required>
          </div>
          <div class="input-box">
            <span class="details">Home Town</span>
            <input type="text" name="address" placeholder="VD: Bắc Ninh" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="email@gmail.com" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input id="password" type="password" name="password" placeholder="Mật khẩu của bạn" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input id="confirm_password" type="password" name="cpassword" placeholder="Nhập lại mật khẩu của bạn" required>
          </div>
          <span id="message"></span>
        </div>
        <div class="button">
          <input type="submit" name="dangky" value="Register">
          <div style="padding-top: 15px;">
            <span>Bạn đã có mật khẩu? <a style="text-decoration: none; font-weight: 500;" href="login.php">Đăng nhập</a></span>
          </div>
        </div>
      </form>
      <script>
        // Hàm kiểm tra mật khẩu và xác nhận mật khẩu
        function checkPassword() {
          var password = document.getElementById('password').value;
          var confirm_password = document.getElementById('confirm_password').value;
          var message = document.getElementById('message');

          if (password == confirm_password) {
            message.innerText = 'Mật khẩu trùng khớp';
            message.style.color = 'green';
          } else {
            message.innerText = 'Mật khẩu không trùng khớp';
            message.style.color = 'red';
          }
        }

        // Lắng nghe sự kiện khi gõ phím
        document.getElementById('password').addEventListener('keyup', checkPassword);
        document.getElementById('confirm_password').addEventListener('keyup', checkPassword);
      </script>

    </div>
  </div>
</body>

</html>