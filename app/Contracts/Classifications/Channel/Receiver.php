<?php

namespace App\Contracts\Classifications\Channel;

interface Receiver
{
    /**
     * 获取该频道的显示类型
     *
     * @param mixed $channel
     * @param string $property
     * @return string
     */
    public function getChannelType($channel, $property = null);

    /**
     * 获取该频道的父级频道
     *
     * @param mixed $channel
     * @return array
     */
    public function getChannelParent($channel);

    /**
     * 获取该频道的父级频道及其上级频道
     *
     * @param mixed $channel
     * @return array
     */
    public function getChannelFamily($channel);

    /**
     * 获取该频道的元数据,包括了URL和名称
     *
     * @param mixed $channel
     * @param string $property
     * @return array|string
     */
    public function getChannelMeta($channel, $property = null);

    /**
     * 列出与该频道相关的父级频道及其上级频道
     *
     * @param mixed $channel
     * @param mixed $breadcrumb
     * @return array
     */
    public function listRelativelyChannel($channel, $breadcrumb = null);
}
