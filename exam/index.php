<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Site</title>
</head>
<body>
<div class="container">   
 <div id="loginForm" class="form login">
            <form action="auth.php" method="post">
                <h1>Авторизация</h1>
                <p>
                    <label class="uname"> Логин </label>
                    <input name="username" required type="text"/>
                </p>
                <p>
                    <label class="youpasswd"> Пароль </label>
                    <input name="password" required type="password" />
                </p>
                <p class="button">
                    <input type="submit" value="Войти" />
                </p>

                <p class="link" >Если нет аккаунта <span id="register">Зарегистрироваться</span></p>
                
            </form>
        </div>
        <div id="registerForm" class="form register">
            <form action="register.php" method="post">
                <h1>Регистрация</h1>
                <p>
                    <label class="uname">ФИО</label>
                    <input  name="usernamesignup" required type="text"/>
                </p>
                <p>
                    <label class="youmail" >Почта</label>
                    <input name="emailsignup" requiredtype="text"/>
                </p>
                <p>
                    <label class="youpasswd">Пароль</label>
                    <input name="passwordsignup" required type="password" />
                </p>
                
                <p class="button">
                    <input type="submit" value="Зарегистрироваться"/>
                </p>
                <p class="link">Уже есть аккаунт? <span id="login">Авторизация</span></p>
            </form>
        </div>
    </div>
<script>

var loginA = document.getElementById("login");
var registerA = document.getElementById("register");
loginA.addEventListener('click', function () {
  toggleForm('login')
})
registerA.addEventListener('click', function () {
  toggleForm('register')
})
    function toggleForm(formName) {
        var loginForm = document.getElementById("loginForm");
        var registerForm = document.getElementById("registerForm");
        if (formName === 'login') {
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
        } else if (formName === 'register') {
            loginForm.style.display = 'none';
            registerForm.style.display = 'block';
        }
    }
</script>
</body>
</html>