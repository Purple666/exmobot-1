<?php require_once('_header.php') ?>
<?php require_once('_topmenu.php')?>

<?php
 $work_dir = substr(__DIR__, 0, strrpos(__DIR__, 'web/pages'));
?>
    <h3>Запуск ботов</h3>

        <pre>
        Боты запускаются с помощью cron.
        Параметром при запуске служит полный путь к файлу конфигурации.
        Могут запускаться несколько экзкмпляров ботов, работающих на разных
        биржах, с разными стратегиями и т.д.
        Указания боту какую использовать биржу и какую торговую стратегию и
        другие параметры содержатся в файле конфигурации.
        Примеры:
        Открываем для редактирования crontab:
        $crontab -e
        Записываем туда:
        * * * * * <?php echo $work_dir?>bot.py --config-file=<?php echo $work_dir?>conf/btce_eth_usd_flip.conf
        */3 * * * * <?php echo $work_dir?>bot.py -c <?php echo $work_dir?>conf/exmo_eth_usd_flip.conf

        Первая строка будет запускать бота каждую минуту с файлом конфигурации btce_eth_usd_flip.conf
        Вторая строка будет запускать бота каждые 3 минуты с файлом конфигурации exmo_eth_usd_flip.conf
        Для приостановки работы бота нужно закомментировать соответствующую строчку.

        Для просмотра показаний датчиков (вкладка "Оборудование") должна быть установлена утилита sensors
        (sudo apt-get install lm-sensors)

        На вкладке "База данных -> Запрос" можно делать запросы к базе данных, в том числе и запросы на модификацию.
        Пример удаления записей из таблицы старше 1 часа:
        DELETE FROM session_data WHERE utime < (strftime('%s','now') - 3600)

        Пример экспорта запроса из базы MySQL в файл .csv, который может быть открыт в Exel:
        SELECT 'utime', 'exchange', 'pair', 'orders_qt_sell', 'orders_qt_buy'
        UNION ALL
        (SELECT utime, exchange, pair, orders_qt_sell, orders_qt_buy FROM stat WHERE exchange='btce'
        INTO OUTFILE '/tmp/stat_data3.csv' FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\n')



        </pre>




<?php require_once('_footer.php')?>