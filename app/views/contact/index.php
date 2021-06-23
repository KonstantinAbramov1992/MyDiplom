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
            <h1>Обратная связь</h1>
            <p>Напишите нам, если у вас есть вопросы</p>
            <form>
                <input type="email" id="contact-email" placeholder="Введите email" class="form-control">
                <input type="text" id="contact-login" placeholder="Введите имя" class="form-control">
                <input type="text" id="age" placeholder="Введите возраст" class="form-control">
                <textarea id="contact-message" class="form-control" placeholder="Введите сообщение"></textarea>
                <button type="button" id="send-message" class="btn btn-warning mt-2">Отправить!</button>
            </form>
            <div id="success-send-message" class="alert alert-success mt-2" style="display: none"></div>
            <div id="fail-send-message" class="alert alert-danger mt-2" style="display: none"></div>
        </div>
        <div class="col-3">

        </div>
    </div>
</div>

<?php require_once 'public/blocks/footer.php'; ?>
<script src="public/ajax/contact.js"></script>
</body>
</html>
