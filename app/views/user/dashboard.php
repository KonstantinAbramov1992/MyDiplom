<!DOCTYPE html>
<html lang="ru">
<?php require_once 'public/blocks/head.php'; ?>
<body>
    <?php require 'public/blocks/header.php' ?>

    <div class="container mb-5">
        <div class="row mt-5">
            <div class="col-12">
                <h1>Кабинет пользователя</h1>
            </div>
        </div>
        <div class="row">
            <p>Привет, <b><?=$data['user']['login']?></b></p>
        </div>
        <div class="row mb-5">
            <form action="/user/dashboard" method="post">
                <input type="hidden" name="exit_btn">
                <button type="submit" class="btn btn-danger mb-5">Выйти</button>
            </form>
        </div>

    <?php require 'public/blocks/footer.php' ?>
</body>
</html>