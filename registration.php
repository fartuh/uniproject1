<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="icon" href="assets/реєстрація.png">
  <link rel="stylesheet" href="registration.css">
</head>
<body>
  <div>
  <form class="form-style">
      <h1>Register</h1>
      <p>Please fill in this form to create an account.</p>
      
      <hr>
      <label for="username"><b>Login</b></label>
      <input class="form-control-item" type="text" name="username" maxlength="20" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" id="username" placeholder="Enter Login" required>
  
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
  
      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
      <hr>
  
      <button type="submit" class="registerbtn">Register</button>

          <div class="container signin">
            <p>Already have an account? <a href="#">Sign in</a>.</p>
          </div>
  </form>
</div>
</body>
</html>