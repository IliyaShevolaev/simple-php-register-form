<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>

    <link rel="stylesheet" href="/styles/register-style.css">
</head>

<body>
    <div class="container">
        <div class="login-form">
            <h2>Регистрация</h2>

            <?php 
                if (isset($_GET["loginExists"])) {
                    echo '<div class="error-message">Такой логин уже существует!</div>';
                }
            ?>

            <form action="/php/register.php" method="post">
                <label for="username">Логин</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Зарегистрироваться</button>

                <div class="register-link">
                    <span>Уже есть аккаунт?</span>
                    <a href="/index.php">Войти</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>