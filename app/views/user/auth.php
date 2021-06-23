<!DOCTYPE html>
<html lang="ru">
<?php require_once 'public/blocks/head.php'; ?>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6 form-holder">
                <h1>Авторизация</h1>
                <p>Здесь вы можете авторизоваться на сайте</p>
                <form>
                    <input type="email" id="auth-email" placeholder="Введите email" class="form-control">
                    <input type="password" id="auth-pass" placeholder="Введите пароль" class="form-control">
                    <button type="button" class="btn btn-success" id="auth">Готово!</button>
                </form>
                <div id="fail-auth" style="display: none" class="alert alert-danger mt-2"></div>
            </div>
            <div class="col-3">

            </div>
        </div>
    </div>

    <?php require 'public/blocks/footer.php' ?>
    <script src="../public/ajax/auth.js"></script>
</body>
</html>