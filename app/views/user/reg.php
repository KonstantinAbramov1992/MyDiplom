<!DOCTYPE html>
<html lang="ru">

<?php require_once 'public/blocks/head.php'; ?>

<body>
<?php require_once 'public/blocks/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6 form-holder">
            <h1>Сокра.тим!</h1>
            <p>Нужно сократить ссылку? Сделаем! Сначала зарегистрируетесь, или <a href="/user/auth">войдите</a></p>
            <form>
                <input type="email" id="reg-email" placeholder="Введите email" class="form-control">
                <input type="text" id="reg-login" placeholder="Введите логин" class="form-control">
                <input type="password" id="reg-pass" placeholder="Введите пароль" class="form-control">
                <button type="button" class="btn btn-success" id="reg">Готово!</button>
            </form>
            <div class="alert alert-danger mt-2" style="display: none" id="fail-reg"></div>
        </div>
        <div class="col-3">

        </div>
    </div>
</div>

<?php require_once 'public/blocks/footer.php'; ?>
<script src="public/ajax/reg.js"></script>
</body>
</html>
