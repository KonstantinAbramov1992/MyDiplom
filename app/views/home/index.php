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
                <p>Нужно сократить ссылку? Сделаем!</p>
                <form>
                    <input type="url" id="link" placeholder="Длинная ссылка" class="form-control">
                    <input type="text" id="short-link" placeholder="Короткая ссылка" class="form-control">
                    <button type="button" class="btn btn-warning" id="make-short-link">Уменьшить!</button>
                </form>
                <div class="alert alert-danger mt-2" id="fail-short-link" style="display: none"></div>
            </div>
            <div class="col-3">

            </div>
        </div>
        <?php for($i = 0; $i < count($data['links']); $i++): ?>
        <div class="row">
            <div class="col-3">

            </div>
            <div class="alert alert-secondary col-6">
                <p>Длинная: <?=$data['links'][$i]['long_name']?></p>
                <p>Короткая: <a href="s/<?=$data['links'][$i]['short_name']?>">localhost/s/<?=$data['links'][$i]['short_name']?></a></p>
                <form>
                    <input type="text" hidden="true" value="<?=$data['links'][$i]['id']?>" id="link-id">
                    <button type="button" class="btn btn-danger" id="delete-link">Удалить<i class="fas fa-trash"></i></button>
                </form>
            </div>
            <div class="col-3">

            </div>
        </div>
        <?php endfor;?>
    </div>

    <?php require_once 'public/blocks/footer.php'; ?>
    <script src="public/ajax/links.js"></script>
</body>
</html>