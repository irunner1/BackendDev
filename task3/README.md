# Задание для работы 3

<p style="text-align: justify">
    В задании предлагается создать сложную серверную конфигурацию,
    состоящую из связки apache+nginx+php+База данных. Возможно
    использование связки apache+php как единый компонент. В данной
    конфигурации предполагается создание как минимум 3
    элементов(контейнеров) или использование как основы серверной
    конфигурации, созданной в практической работе №1. В этой конфигурации
    предполагается акселерированное проксирование без кэширования.
    Схематично предполагаемый алгоритм работы изображен на рисунке. 
</p>

<p align="center">
    <img src="https://sun9-70.userapi.com/impg/yQ4s62wyTJZJOQZRs7vj-QnwsbNCYfl_lzPNDA/raUNGtfGITw.jpg?size=339x271&quality=96&sign=4d9bf39af4870c89ab470b75e8b349d3&type=album" alt="Скриншот" width="400"/>
</p>

<p style="text-align: justify">
    Предполагается, что сервер nginx будет отображать статический
    контент, а apache динамический и в связке мы получим быстродейственную
    и эффективную систему. 
</p>