<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
//
//        Event::listen('laravels.received_request', function (Request $request, $app) {
//            $request->query->set('get_key', 'swoole-get-param');// 修改 GET 请求参数
//            $request->request->set('post_key', 'swoole-post-param'); // 修改 POST 请求参数
//        });

//        Event::listen('laravels.generated_response', function (Request $request, Response $response, $app) {
//            $response->headers->set('header-key', 'swoole-header');
//        });
    }
}
