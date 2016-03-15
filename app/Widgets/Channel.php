<?php

namespace App\Widgets;

use Countable;
use ArrayAccess;
use Traversable;
use JsonSerializable;
use IteratorAggregate;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;
use App\Contracts\Classifications\Channel\Manager as ChannelManagerContract;
use App\Contracts\Classifications\Channel\Receiver as ChannelReceiverContract;

class Channel implements Arrayable, ArrayAccess, ChannelManagerContract, ChannelReceiverContract, Countable, IteratorAggregate, Jsonable, JsonSerializable
{

    /**
     * 存储当前频道数据集
     *
     * @var $channel
     */
    private $channel;

    /**
     * 存储菜单所有项的数据
     *
     * @var array $menu
     */
    public $menu = [];

    /**
     * 仅存储关于mega菜单相关的数据项
     *
     * @var array $mega
     */
    public $mega = [];

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        // TODO: Implement toArray() method.
    }

    /**
     * Retrieve an external iterator
     * @link  http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
    }

    /**
     * Whether a offset exists
     * @link  http://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     *                      An offset to check for.
     *                      </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * Offset to retrieve
     * @link  http://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset <p>
     *                      The offset to retrieve.
     *                      </p>
     *
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    /**
     * Offset to set
     * @link  http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     *                      The offset to assign the value to.
     *                      </p>
     * @param mixed $value  <p>
     *                      The value to set.
     *                      </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * Offset to unset
     * @link  http://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     *                      The offset to unset.
     *                      </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        // TODO: Implement toJson() method.
    }

    /**
     * 连接到存放channel数据集的指定数据库,并获取数据集
     *
     * @return array
     */
    public function connection()
    {
        // TODO: Implement connection() method.
    }

    /**
     * 提供一种自定义频道的方式
     *
     * @param string $title
     * @param string $uri
     * @param string $default
     *
     * @return void
     */
    public function url($title, $uri, $default = '')
    {
        // TODO: Implement url() method.
    }

    /**
     * 提供一种转换成mega属性的方式
     *
     * @param array  $family
     * @param string $class
     * @param string $column
     *
     * @return array
     */
    public function mega(array $family, $class, $column = '')
    {
        // TODO: Implement mega() method.
    }

    /**
     * 提供一种把即时修改的频道信息保存到数据库的方式
     *
     * @return void
     */
    public function store()
    {
        // TODO: Implement store() method.
    }

    /**
     * 获取该频道的显示类型
     *
     * @param mixed  $channel
     * @param string $property
     *
     * @return string
     */
    public function getChannelType($channel, $property = null)
    {
        // TODO: Implement getChannelType() method.
    }

    /**
     * 获取该频道的父级频道
     *
     * @param mixed $channel
     *
     * @return array
     */
    public function getChannelParent($channel)
    {
        // TODO: Implement getChannelParent() method.
    }

    /**
     * 获取该频道的父级频道及其上级频道
     *
     * @param mixed $channel
     *
     * @return array
     */
    public function getChannelFamily($channel)
    {
        // TODO: Implement getChannelFamily() method.
    }

    /**
     * 获取该频道的元数据,包括了URL和名称
     *
     * @param mixed  $channel
     * @param string $property
     *
     * @return array|string
     */
    public function getChannelMeta($channel, $property = null)
    {
        // TODO: Implement getChannelMeta() method.
    }

    /**
     * 列出与该频道相关的父级频道及其上级频道
     *
     * @param mixed $channel
     * @param mixed $breadcrumb
     *
     * @return array
     */
    public function listRelativelyChannel($channel, $breadcrumb = null)
    {
        // TODO: Implement listRelativelyChannel() method.
    }

    /**
     * Count elements of an object
     * @link  http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        // TODO: Implement count() method.
    }

    /**
     * Specify data which should be serialized to JSON
     * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
}}