<?php

namespace App\Http\Controllers;

use App\Jobs\LogSimpleMessage;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function index()
    {
        Redis::set('user:1:name', 'Ariful Haque');
        Redis::set('user:2:name', 'Rifat');
        Redis::set('user:3:name', 'Asif');
        Redis::set('user:4:name', 'Lotus Kamal');

        return response()->json(['message' => 'User names stored in Redis']);
    }

    public function getUsers()
    {
        $users = [
            'user:1:name' => Redis::get('user:1:name'),
            'user:2:name' => Redis::get('user:2:name'),
            'user:3:name' => Redis::get('user:3:name'),
            'user:4:name' => Redis::get('user:4:name'),
        ];

        return response()->json($users);
    }

    public function deleteUsers()
    {
        Redis::del('user:1:name', 'user:2:name', 'user:3:name', 'user:4:name');

        return response()->json(['message' => 'User names deleted from Redis']);
    }

    public function dispatchJob()
    {
        LogSimpleMessage::dispatch('Hello from Laravel Redis queue!');

        return response()->json(['message' => 'Job dispatched! Check your logs.']);
    }
}
