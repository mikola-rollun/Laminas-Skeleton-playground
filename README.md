Замеченные проблемы:

1. Некорректно работают регулярные выражения, у которых в шаблоне используется символ "-",
   например preg_match([\w-]), теперь нужно экранировать - preg_match([\w\-])
2. Не удалось запустить сессии. Не разобрался
3. Dotenv теперь не добавляет переменные окружения, если у него не указан параметр usePutenv.
   Нужно вызвать метод usePutenv(true). У нас это в config.php