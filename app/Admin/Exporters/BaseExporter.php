<?php
/**
 * Created By PhpStorm
 * Author: Kevin
 * Date: 2020/9/11 15:22
 * Email: 863129201@qq.com
 */

namespace App\Admin\Exporters;


use Encore\Admin\Grid\Exporters\ExcelExporter;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class BaseExporter extends ExcelExporter implements WithMapping, WithEvents,ShouldAutoSize
{
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // 设置单元格宽度
//                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth('18');
                //设置区域单元格垂直居中
                $event->sheet->getDelegate()->getStyle('A:Z')->getAlignment()->setVertical('center');
                //设置区域单元格水平居中
                $event->sheet->getDelegate()->getStyle('A:Z')->getAlignment()->setHorizontal('center');
                //设置区域单元格字体、颜色、背景等，其他设置请查看 applyFromArray 方法，提供了注释
//                $event->sheet->getDelegate()->getStyle('A1:Z1')->applyFromArray([
//                    'font' => [
//                        'name' => 'Verdana',
//                        'bold' => true,
//                        'italic' => false,
//                        'strikethrough' => false,
//                        'color' => [
//                            'rgb' => 'FFFFFF'
//                        ]
//                    ],
//                    'fill' => [
//                        'fillType' => 'linear', //线性填充，类似渐变
//                        'rotation' => 45, //渐变角度
//                        'startColor' => [
//                            'rgb' => '54AE54' //初始颜色
//                        ],
//                        //结束颜色，如果需要单一背景色，请和初始颜色保持一致
//                        'endColor' => [
//                            'argb' => '54AE54'
//                        ]
//                    ]
//                ]);
            },
        ];
    }

    public function map($row): array
    {

    }
}
