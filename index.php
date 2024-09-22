<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>

    <link rel="stylesheet" href="styles/register-style.css">
</head>

<body>
    <div class="container">
        <div class="login-form">
            <h2>Вход в систему</h2>

            <?php 
                if (isset($_GET["wrongData"])) {
                    echo '<div class="error-message">Неверный логин или пароль</div>';
                }
            ?>

            <form action="php/login.php" method="post">
                <label for="username">Логин</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Войти</button>

                <div class="register-link">
                    <span>Нет аккаунта?</span>
                    <a href="html/register.php">Зарегистрироваться</a>
                </div>

            </form>
        </div>
    </div>

</body>

</html>