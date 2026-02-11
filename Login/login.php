<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AgriStuff</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>
  <div class="login_form">
    <form action="../php/log_in.php" method="post">

      <center><div class="log-in-icon"></div></center><br>

      <h3>Log in</h3>
      <br>

      <?php if (isset($_SESSION["error"])): ?>
          <p style="color: red; text-align: center;"><?php echo $_SESSION["error"]; unset($_SESSION["error"]); ?></p>
      <?php endif; ?>

      <div class="input_box">
        <label for="mobile">Mobile Number *</label>
        <input type="text" id="mobile" name="mobile" placeholder="Enter Mobile Number" required />
      </div>

      <div class="input_box">
        <label for="password">Password *</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required />
        <a href="#">Forgot Password?</a>
      </div>

      <button class="login-btn" type="submit">Log In</button>

      <p class="sign_up">Don't have an account?<br> <a href="../SignUp/sign-up.php">Sign up</a></p>
    </form>
  </div>
</body>
</html>
