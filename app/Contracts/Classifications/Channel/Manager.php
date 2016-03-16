<?php

namespace App\Contracts\Classifications\Channel;

interface Manager
{
    /**
     * 连接到存放channel数据集的指定数据库,并获取数据集
     *
     * @return \App\Widgets\Channel
     */
    public function connection();

    /**
     * 提供一种自定义频道的方式
     *
     * @param string $title
     * @param string $uri
     * @param string $default
     * @return void
     */
    public function url($title, $uri, $default = '');

    /**
     * 提供一种转换成mega属性的方式
     *
     * @param array $family
     * @param string $class
     * @param string $column
     * @return array
     */
    public function mega(array $family, $class, $column = '');

    /**
     * 提供一种把即时修改的频道信息保存到数据库的方式
     *
     * @return void
     */
    public function store();
}