<?php

namespace App\Contracts\Classifications\Channel;

interface Receiver
{
    /**
     * 获取该频道的显示类型
     *
     * @param int|string $identity
     * @return string
     */
    public function getChannelType($identity);

    /**
     * 获取该频道的父级频道
     *
     * @param string $property
     * @param string|int $value
     * @return stringg
     */
    public function getChannelParent($property, $value);

    /**
     * 获取该频道的父级频道及其上级频道
     *
     * @param string $selfname
     * @param int $index
     * @return array
     */
    public function getChannelFamily($selfname, $index);

    /**
     * 获取该频道的元数据,包括了URL和名称
     *
     * @param string $property
     * @param string $except
     * @return array|string
     */
    public function getChannelMeta($property, $except = '');

    /**
     * 列出与该频道相关的父级频道及其上级频道
     *
     * @param string $selfname
     * @param mixed $breadcrumb
     * @return array
     */
    public function listRelativelyChannel($selfname, $breadcrumb = null);
}
