<?php

namespace App\Http\Controllers;

use App\Http\Requests\EchoRequest;
use App\Logs;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class EchoController extends Controller
{
    public function echo(EchoRequest $request)
    {
        $data = $request->validated();

        Log::info('test request', ['received' => $data]);

        $log = Logs::create([
            'test_text' => Arr::get($data, 'test')
        ]);

        return $log->toArray();
    }
}
