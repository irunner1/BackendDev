# Задание для работы 5

<p style="text-align: justify">
    Предполагается выполнить апгрейд разрабатываемого в процессе
    первых 4 практических работ интернет-ресурса механизмами обработки
    сессий и согласования контента. Предлагается добавить следующую
    функциональность:
</p>

 <ul> 
    <li>Хранение данных сессий в БД Redis</li>
    <li>
        Использование данных для согласования контента на уровне
        сервера для формирования контента пользователя с
        помощью(выбор по варианту). Требуется использовать хотя
        бы 3 параметра для формирования индивидуального контента,
        например, логин пользователя, тема(темная, светлая или для
        людей с цветовой слепотой) и рекомендуемый язык.
    </li>
    <ul>
     <li>файлов cookie</li>
     <li>файлов сессий</li>
    </ul>
    <li>
        Загрузка файлов в формате pdf на сервер и хранение их(выбор
        по варианту), а также их выдача обратно пользователю по
        запросу.
    </li>
    <ul>
     <li>в файловой системе сервера</li>
     <li>в реляционной базе данных</li>
     <li>в не реляционной базе данных</li>
    </ul>
 </ul>

<p>
    Предполагается создание стабильной версии интернет-ресурса и
    сохранение предыдущей функциональности с практических работ 1-4.
</p>