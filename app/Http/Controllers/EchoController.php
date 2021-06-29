<?php

namespace App\Http\Controllers;

use App\Http\Requests\EchoRequest;

class EchoController extends Controller
{
    public function echo(EchoRequest $request)
    {
        $data = $request->validated();
        return $data;
    }
}
