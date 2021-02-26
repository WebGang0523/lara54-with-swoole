<?php


$server = new \Swoole\Http\Server('127.0.0.1', 9588);

$server->on('Request', function ($request, $response) {

    var_dump(time());

    $mysql = new Swoole\Coroutine\MySQL();
    $mysql->connect([
        'host' => '120.27.140.11',
        'user' => 'root',
        'password' => 'Xipu123',
        'database' => 'kuaigames_site_copy',
    ]);
    $mysql->setDefer(true);
    $mysql->query('select sleep(3)');

    var_dump(time());

    $redis1 = new Swoole\Coroutine\Redis();
    $redis1->connect('192.168.20.255', 6379);
    $redis1->setDefer(true);
    $redis1->set('hello', 'world');

    var_dump(time());

    $redis2 = new Swoole\Coroutine\Redis();
    $redis2->connect('192.168.20.255', 6379);
    $redis2->setDefer(true);
    $redis2->get('hello');

    $result1 = $mysql->recv();
    $result2 = $redis2->recv();

    var_dump($result1, $result2, time());

    $response->end('Request Finish: ' . time());
});

$server->start();