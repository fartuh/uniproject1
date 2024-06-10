<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="icon" href="assets/icons8-вход-в-систему,-в-кружке,-стрелка-вправо-50.png">
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div>
    <form class="form-style" method="post" action="login">
        <h3 class="text-center">Форма входу</h3>
        <div>
            <input class="form-control-item" type="text" name="login" maxlength="15" minlength="4" pattern="^[a-zA-Z0-9_.-]*$" id="username" placeholder="Логин" required>
        </div>

        <div>
            <input class="form-control-item" type="password" name="pass" minlength="6" id="password" placeholder="Пароль" required>
        </div>

        <div class="form-group">
            <button class="create-account" type="submit" id="enter-account">Вхід в аккаунт</button>
        </div>
    </form>
</div>
</body>
</html>
