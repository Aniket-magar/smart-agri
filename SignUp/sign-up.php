<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AgriStuff - Sign Up</title>
  <link rel="shortcut icon" href="../Assets/logo.jpg" type="image/x-icon">
  <link rel="stylesheet" href="sign-up.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.min.css">
</head>

<body>
  <div class="login_form">
    <form action="../php/insert_signup.php" method="post">

      <center>
        <div class="sign-up-icon">
          <!-- <img src="/Assets/farm.jpg"> -->
        </div>
      </center>
      <br>

      <h3>Sign Up</h3>
      <br>

      <!-- Full Name Input -->
      <div class="input_box">
        <label for="name">Full Name *</label>
        <input type="text" id="name" name="fullname" placeholder="Enter Full Name" required />
        <span id="name_error"></span>
      </div>

      <!-- District Selection -->
      <div class="form-group">
        <label for="inputdist">District *</label>
        <select class="form-control" id="inputdist" name="district" onchange="updateTaluka()">
          <option value="Selectdist">Select District</option>
          <option value="Chh.sabhajinagar">Chh. Sambhajinagar</option>
        </select>
        <span id="district_error"></span>
      </div>
      <br>

      <!-- Taluka Selection -->
      <div class="form-group">
        <label for="inputtaluka">Taluka *</label>
        <select class="form-control" id="inputtaluka" name="taluka" onchange="updateVillage()">
          <option value="Selecttaluka">Select Taluka</option>
        </select>
        <span id="taluka_error"></span>
      </div>
      <br>

      <!-- Village Selection -->
      <div class="form-group">
        <label for="inputvillage">Village *</label>
        <select class="form-control" id="inputvillage" name="village">
          <option value="Selectvillage">Select Village</option>
        </select>
        <span id="village_error"></span>
      </div>
      <br>

      <!-- Address -->
      <div class="input_box">
        <label for="address">Address *</label>
        <input type="text" id="address" name="address" placeholder="Enter Address" required />
        <span id="address_error"></span>
      </div>

      <!-- Mobile Number -->
      <div class="input_box">
        <label for="Mobile">Mobile Number *</label>
        <input type="text" id="Mobile" name="mobile" placeholder="Enter Mobile Number" required />
        <span id="mobile_error"></span>
      </div>

      <!-- Password Input -->
      <div class="input_box">
        <label for="password">Password *</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required />
        <span id="password_error"></span>
      </div>

      <!-- Retype Password Input -->
      <div class="input_box">
        <label for="retype_password">Retype Password *</label>
        <input type="password" id="retype_password" name="retype_password" placeholder="Retype your password" required />
        <span id="retype_password_error"></span>
      </div>

      <!-- Land Area -->
      <div class="input_box">
        <label for="land_area">Land Area (in acres) *</label>
        <input type="number" id="land_area" name="land_area" placeholder="Enter your total land area" required />
        <span id="land_area_error"></span>
      </div>
      <br>

      <!-- Sign Up Button -->
      <button class="login-btn" type="submit">SIGN UP</button>

      <p class="sign_up">Already have an account?<br><br> <a href="../Login/login.php">Login </a></p>
    </form>
  </div>
</body>

<script type="text/javascript" src="sign-up.js"></script>
</html>
