<?php

namespace App\Http\Controllers\Api\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function fallBack()
    {
        return response()
            ->json(['code' => 404, 'msg' => '请检查访问地址或请求方式是否正确', 'data' => []])
            ->setStatusCode(404);
    }
}
