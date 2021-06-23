<header>
    <div class="container">
        <div class="row header">
            <div class="col-1">
                <img src="/public/img/Logo.jpg" alt="Logo" class="logo">
            </div>
            <div class="col-3">
                <p>Уберём всё лишнее из ссылки!</p>
            </div>
            <div class="col-2">

            </div>
            <div class="col-6">
                <div class="menu">
                    <a href="/">Главная</a>
                    <a href="/contact">Контакты</a>
                    <a href="/contact/about">Про нас</a>
                    <?php if (isset($_COOKIE['login'])): ?>
                    <a href="/user/dashboard">Личный кабинет</a>
                    <?php else: ?>
                    <a href="/user/auth">Войти</a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</header>