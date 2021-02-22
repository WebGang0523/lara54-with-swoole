<?php

namespace App\Services;

use Hhxsv5\LaravelS\Swoole\WebSocketHandlerInterface;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;
use Illuminate\Support\Facades\Log;

class WebSocketService implements WebSocketHandlerInterface
{

    public function __construct()
    {
    }

    /**
     * @inheritDoc
     */
    public function onOpen(Server $server, Request $request)
    {
        Log::info('WebSocket 连接建立');
        $server->push($request->fd, 'Welcome to WebSocket Server built on LaravelS');
    }

    /**
     * @inheritDoc
     */
    public function onMessage(Server $server, Frame $frame)
    {
        $server->push($frame->fd, 'This is a message sent from WebSocket Server at ' . date('Y-m-d H:i:s'));
    }

    /**
     * @inheritDoc
     */
    public function onClose(Server $server, $fd, $reactorId)
    {
        Log::info('WebSocket 连接关闭');
    }
}