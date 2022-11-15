<div id="header" class="main_header">
    <?php if ($_SESSION['login'] != ' ') {
        echo '<h1 class="text">Добро пожаловать, ' . $_SESSION['login'] . '!</h1>';
    } ?>
    <div>
        <input class="inpt" placeholder="Ваше имя">
        <button class="btn" onclick="setLogin()">Задать имя</button>
    </div>
    <button class="btn" onclick="changeTheme()">Сменить тему</button>
</div>