<?php

class MegaFilm {
    protected $address;
    protected $port;
    protected $socket;
    protected $debug = false;
    protected $delay = 100000;

    function __construct($address = '127.0.0.1', $port = 22, $debug = false) {
        ob_implicit_flush();
        $this->address = $address;
        $this->port    = $port;
        $this->debug   = (bool)$debug;
        if ($this->debug) {
            $this->log("");
            $this->log("SYSTEM: " . str_repeat('-', 72));
        }

        if (($this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {
            $this->log("Error socket_create");
            exit;
        }
        else {
            if ($this->debug) {
                $this->log("Socket created");
            }
        }
        $result = socket_connect($this->socket, $this->address, $this->port);
        if ($result === false) {
            $this->log("Error socket_connect");
            exit;
        }
        else {
            if ($this->debug) {
                $this->log("Socket connected");
            }
        }
        if ($this->debug) {
            $this->log(str_repeat('-', 80));
        }
    }

    function showDebug() {
        $this->debug = true;
        return $this;
    }

    function log($msg) {
        echo trim($msg) . PHP_EOL;
    }

    function put($msg_array, $log = true) {
        try {
            $this->log('');
            $msg_array = (array)$msg_array;
            $msg       = implode("\r\n", $msg_array);
            if ($this->debug) {
                $this->log(str_pad('>> WRITE >> ', 80, '#', STR_PAD_BOTH));
                foreach ($msg_array as $_msg) {
                    $this->log($_msg);
                }
            }
            socket_write($this->socket, $msg, mb_strlen($msg));
            socket_set_nonblock($this->socket);
            if ($this->debug) {
                $this->log(str_pad('<< READ << ', 80, '#', STR_PAD_BOTH));
            }
            $ret = '';
            do {
                if (false === ($buf = socket_read($this->socket, 1024, PHP_NORMAL_READ))) {
                    echo socket_strerror(socket_last_error($this->socket));
                    break;
                }
                if (!$buf = trim($buf)) {
                    continue;
                }
                $ret .= $buf;
                if ($this->debug) {
                    $this->log($buf);
                }
                usleep($this->delay);
            } while ($buf != false);
            return $ret;
        } catch (Exception $e) {
            var_dump(socket_strerror(socket_last_error($this->socket)));
            var_dump($e->getCode());
            return false;
        }

    }


    function stop() {
        $this->put('exit', false);
        if (isset($this->socket)) {
            socket_close($this->socket);
            if ($this->debug) {
                $this->log("Socket closed");
            }
        }
        if ($this->debug) {
            $this->log(str_repeat('-', 80));
        }
    }

    function commandScheduleDayCount() {
        return $this->put(['GET: SCHEDULEDAYSCOUNT']);
    }

    function commandFilmSessions($id, $days = 5) {
        $str         = $this->put([
            'GET: FILMSESSIONS',
            'ID: ' . $id,
            'REQUESTID: qw1f6d4c2g3r',
            'DAYS: ' . $days,
        ]);
        $xml         = simplexml_load_string($str);
        $ret         = [];
        $ret['id']   = $id;
        $ret['name'] = $this->arr_get($xml, 'name') . '';
        //        var_dump($xml);
        if (isset($xml->sessions)) {
            foreach ($xml->sessions as $item) {
                $date = $this->arr_get($item, 'date') . '';
                foreach ($item->session as $session) {
                    $time                        = $this->arr_get($session, 'time') . '';
                    $id                          = $this->arr_get($session, 'id') . '';
                    $hall_id                     = $this->arr_get($session, 'hall_id') . '';
                    $price                       = $this->arr_get($session, 'price') . '';
                    $ret['sessions'][$date][$id] = [
                        'hall_id' => $hall_id,
                        'price'   => $price,
                        'time'    => $time,
                    ];
                }
            }
        }
        return $ret;
    }

    function commandDaySchedule($days = 5) {
        $str = $this->put([
            "GET: DAYSCHEDULE",
            "DAYS: " . $days,
        ]);
        $xml = simplexml_load_string($str);
        $ret = [];
        if ($xml) {
            foreach ($xml as $item) {
                $date            = $this->arr_get($item, 'date');
                $films           = $this->arr_get($item, 'films');
				$films = str_replace('\'', '', $films);
                $ret[$date . ''] = explode(' ', $films);
            }
        }
        return $ret;
    }

    function arr_get($arr, $k, $default = null) {
        return isset($arr[$k]) ? $arr[$k] : $default;
    }
}

