<?php

namespace App\Admin\Exporters;

class AdminExporter extends BaseExporter
{
    protected $fileName;

    protected $columns = [
        'id' => 'ID',
        'username' => '用户名',
        'name' => '名称',
        'roles' => '角色',
        'created_at' => '创建时间',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->fileName = '管理员列表_' . date('YmdHis') . '.xlsx';
    }

    public function map($data): array
    {
//        dd($this->getData()); // 取到所有数据
        $roles = implode(',', data_get($data, 'roles')->pluck('name')->toArray() ?? []);

        return [
            $data->id,
            $data->username,
            $data->name,
            $roles,
            $data->created_at
        ];
    }

}
