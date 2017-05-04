<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Status;
use App\Models\User;
use Workerman\Worker;

class StaticPagesController extends Controller
{
    public function home()
    {
        // require_once __DIR__ . '/Workerman/Autoloader.php';
        //
        // // 创建一个Worker监听2345端口，使用http协议通讯
        // $http_worker = new Worker("http://0.0.0.0:2345");

        // 启动4个进程对外提供服务
        // $http_worker->count = 4;
        //
        // // 接收到浏览器发送的数据时回复hello world给浏览器
        // $http_worker->onMessage = function($connection, $data)
        // {
        //     // 向浏览器发送hello world
        //     $connection->send('hello world');
        // };
        //
        // // 运行worker
        // Worker::runAll();

        // 首页
        $feed_items = [];
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(30);
        }

        return view('static_pages/home', compact('feed_items'));
    }

    public function help()
    {
        return view('static_pages/help');
    }

    public function about()
    {
        return view('static_pages/about');
    }
}
