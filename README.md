# API кинотеатра megafilm45.ru

для получения прав доступа обращайтесь к администрации кинотеатра, там же узнаете IP-адрес сервера и порт

## Получение количества дней, на которое есть расписание
**scheduledaycount.php**
~~~
<?php
include 'megafilm.php';
$megafilm = new MegaFilm($ip, $port, $is_debug);
$result = $megafilm->commandScheduleDayCount();
$megafilm->stop();
print_r($result);
~~~
вывод ( при включенной отладке):

```console
$ php scheduledaycount.php

SYSTEM: ------------------------------------------------------------------------
Socket created
Socket connected
--------------------------------------------------------------------------------

##################################>> WRITE >> ##################################
GET: SCHEDULEDAYSCOUNT
##################################<< READ << ###################################
30

##################################>> WRITE >> ##################################
exit
##################################<< READ << ###################################
Socket closed
--------------------------------------------------------------------------------
```


## Получение количества дней, на которое есть расписание
**dayschedule.php**
~~~
<?php
include 'megafilm.php';
$megafilm = new MegaFilm($ip, $port, $is_debug);
$result = $megafilm->commandDaySchedule($cnt);
$megafilm->stop();
print_r($result);
~~~

вывод ( при включенной отладке):
```console
$ php dayschedule.php

SYSTEM: ------------------------------------------------------------------------
Socket created
Socket connected
--------------------------------------------------------------------------------

##################################>> WRITE >> ##################################
GET: DAYSCHEDULE
DAYS: 4
##################################<< READ << ###################################
<?xml version="1.0" encoding="utf-8" ?><shedule>
<day date="26.01.2015" films="185 869 872 875 877 878 879 882 883 884 885 886 894" />
<day date="27.01.2015" films="185 869 872 875 877 878 879 882 883 884 885 886 894" />
<day date="28.01.2015" films="185 869 872 875 877 878 879 882 883 884 885 886 894" />
<day date="29.01.2015" films="'" />
<day date="30.01.2015" films="'" />
<day date="31.01.2015" films="'" />
<day date="01.02.2015" films="'" />
<day date="02.02.2015" films="'" />
<day date="03.02.2015" films="'" />
<day date="04.02.2015" films="'" />
<day date="05.02.2015" films="'" />
<day date="06.02.2015" films="'" />
<day date="07.02.2015" films="'" />
<day date="08.02.2015" films="'" />
<day date="09.02.2015" films="'" />
<day date="10.02.2015" films="'" />
<day date="11.02.2015" films="'" />
<day date="12.02.2015" films="'" />
<day date="13.02.2015" films="'" />
<day date="14.02.2015" films="'" />
<day date="15.02.2015" films="'" />
<day date="16.02.2015" films="'" />
<day date="17.02.2015" films="'" />
<day date="18.02.2015" films="'" />
<day date="19.02.2015" films="'" />
<day date="20.02.2015" films="'" />
<day date="21.02.2015" films="'" />
<day date="22.02.2015" films="'" />
<day date="23.02.2015" films="883" />
<day date="24.02.2015" films="883" /></shedule>

##################################>> WRITE >> ##################################
exit
##################################<< READ << ###################################
Socket closed
--------------------------------------------------------------------------------
Array
(
    [26.01.2015] => Array
        (
            [0] => 185
            [1] => 869
            [2] => 872
            [3] => 875
            [4] => 877
            [5] => 878
            [6] => 879
            [7] => 882
            [8] => 883
            [9] => 884
            [10] => 885
            [11] => 886
            [12] => 894
        )

    [27.01.2015] => Array
        (
            [0] => 185
            [1] => 869
            [2] => 872
            [3] => 875
            [4] => 877
            [5] => 878
            [6] => 879
            [7] => 882
            [8] => 883
            [9] => 884
            [10] => 885
            [11] => 886
            [12] => 894
        )

    [28.01.2015] => Array
        (
            [0] => 185
            [1] => 869
            [2] => 872
            [3] => 875
            [4] => 877
            [5] => 878
            [6] => 879
            [7] => 882
            [8] => 883
            [9] => 884
            [10] => 885
            [11] => 886
            [12] => 894
        )

    [29.01.2015] => Array
        (
            [0] =>
        )

    [30.01.2015] => Array
        (
            [0] =>
        )

    [31.01.2015] => Array
        (
            [0] =>
        )

    [01.02.2015] => Array
        (
            [0] =>
        )

    [02.02.2015] => Array
        (
            [0] =>
        )

    [03.02.2015] => Array
        (
            [0] =>
        )

    [04.02.2015] => Array
        (
            [0] =>
        )

    [05.02.2015] => Array
        (
            [0] =>
        )

    [06.02.2015] => Array
        (
            [0] =>
        )

    [07.02.2015] => Array
        (
            [0] =>
        )

    [08.02.2015] => Array
        (
            [0] =>
        )

    [09.02.2015] => Array
        (
            [0] =>
        )

    [10.02.2015] => Array
        (
            [0] =>
        )

    [11.02.2015] => Array
        (
            [0] =>
        )

    [12.02.2015] => Array
        (
            [0] =>
        )

    [13.02.2015] => Array
        (
            [0] =>
        )

    [14.02.2015] => Array
        (
            [0] =>
        )

    [15.02.2015] => Array
        (
            [0] =>
        )

    [16.02.2015] => Array
        (
            [0] =>
        )

    [17.02.2015] => Array
        (
            [0] =>
        )

    [18.02.2015] => Array
        (
            [0] =>
        )

    [19.02.2015] => Array
        (
            [0] =>
        )

    [20.02.2015] => Array
        (
            [0] =>
        )

    [21.02.2015] => Array
        (
            [0] =>
        )

    [22.02.2015] => Array
        (
            [0] =>
        )

    [23.02.2015] => Array
        (
            [0] => 883
        )

    [24.02.2015] => Array
        (
            [0] => 883
        )

)
```

## Получение сеансов фильма
**filmsessions.php**
~~~
<?php
include 'megafilm.php';
$megafilm = new MegaFilm($ip, $port, $is_debug);
$result = $megafilm->commandFilmSessions(877);
$megafilm->stop();
print_r($result);
~~~

вывод ( при включенной отладке):
```console
$ php filmsessions.php

SYSTEM: ------------------------------------------------------------------------
Socket created
Socket connected
--------------------------------------------------------------------------------

##################################>> WRITE >> ##################################
GET: FILMSESSIONS
ID: 877
REQUESTID: qw1f6d4c2g3r
DAYS: 5
##################################<< READ << ###################################
<?xml version="1.0" encoding="utf-8" ?><filmsessions id="877" name="Заложница 3">
<sessions date="26.01.2015">
<session time="12:25" id="61613" hall_id="1" price="200" />
<session time="23:45" id="61560" hall_id="3" price="170" />
</sessions>
<sessions date="27.01.2015">
<session time="12:25" id="61601" hall_id="1" price="200" />
<session time="23:45" id="61568" hall_id="3" price="170" />
</sessions>
<sessions date="28.01.2015">
<session time="12:25" id="61607" hall_id="1" price="200" />
<session time="23:45" id="61576" hall_id="3" price="170" />
</sessions></filmsessions>

##################################>> WRITE >> ##################################
exit
##################################<< READ << ###################################
Socket closed
--------------------------------------------------------------------------------
Array
(
    [id] => 877
    [name] => Заложница 3
    [sessions] => Array
        (
            [26.01.2015] => Array
                (
                    [61613] => Array
                        (
                            [hall_id] => 1
                            [price] => 200
                            [time] => 12:25
                        )

                    [61560] => Array
                        (
                            [hall_id] => 3
                            [price] => 170
                            [time] => 23:45
                        )

                )

            [27.01.2015] => Array
                (
                    [61601] => Array
                        (
                            [hall_id] => 1
                            [price] => 200
                            [time] => 12:25
                        )

                    [61568] => Array
                        (
                            [hall_id] => 3
                            [price] => 170
                            [time] => 23:45
                        )

                )

            [28.01.2015] => Array
                (
                    [61607] => Array
                        (
                            [hall_id] => 1
                            [price] => 200
                            [time] => 12:25
                        )

                    [61576] => Array
                        (
                            [hall_id] => 3
                            [price] => 170
                            [time] => 23:45
                        )

                )

        )

)
```
