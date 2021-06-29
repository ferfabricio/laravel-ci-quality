<?php

namespace App\Http\Controllers;

use App\Http\Requests\EchoRequest;
use App\Logs;
use Illuminate\Support\Arr;

class EchoController extends Controller
{
    public function echo(EchoRequest $request)
    {
        $data = $request->validated();

        $log = Logs::create([
            'test_text' => Arr::get($data, 'test')
        ]);

        return $log->toArray();
    }
}
