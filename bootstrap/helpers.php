<?php

use Illuminate\Pagination\LengthAwarePaginator;

// 根据当前路由生成动态的 class 样式名
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

// 格式化电话号码，隐藏中间的 4 位
function phone_format($str)
{
    return substr_replace($str, '****', 3, 4);
}

// api 返回 data
function responseData($data = [], $message = '', $code = 200, $statusCode = 200)
{
    $res = [
        'code' => $code,
        'msg' => $message,
        'data' => $data
    ];
    //分页特殊处理
    if ($data instanceof LengthAwarePaginator) {
        $data = $data->toArray();
        $page = [
            'current_page' => $data['current_page'],
//			'last_page' => $data['last_page'],
            'per_page' => $data['per_page'],
            'total' => $data['total']
        ];

        $res['data'] = $data['data'];
        $res['pages'] = $page;
    }

    if (isset($data['list'])) {
        $data['list'] = $data['list']->toArray();
        $page = [
            'current_page' => $data['list']['current_page'],
//			'last_page' => $data['list']['last_page'],
            'per_page' => $data['list']['per_page'],
            'total' => $data['list']['total']
        ];

        $res_list['data'] = $data['list']['data'];
        $res_list['pages'] = $page;
        $res['data']['list'] = $res_list;
    }

    return response()->json($res)->setStatusCode($statusCode);
}

// api 返回信息
function responseMessage($message = '', $code = 200, $statusCode = 200,$data = [])
{
    $res = [
        'code' => $code,
        'msg' => $message,
        'data' => $data
    ];

    return response()->json($res)->setStatusCode($statusCode);
}

// 递归获取子元素
function get_child($data, $pid)
{
    $tree = array(); //每次声明一个新数组用来放子元素
    foreach ($data as $key => $v) {
        //匹配子记录
        if ($v['parent_id'] === $pid) {
            if (get_child($data, $v['id'])) {
                $v['children'] = get_child($data, $v['id']);  //递归获取子记录
            }
            $tree[] = $v;//将记录存入新数组
        }
    }
    return $tree; //返回新数组
}

function randFloat($min = 0, $max = 1)
{
    $rand = $min + mt_rand() / mt_getrandmax() * ($max - $min);
    return (float)number_format($rand, 2);
}
