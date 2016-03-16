<?php

namespace App\Widgets;

use Countable;
use ArrayAccess;
use Traversable;
use JsonSerializable;
use IteratorAggregate;
use App\Channel as ChannelModel;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;
use App\Contracts\Classifications\Channel\Register as ChannelContract;
use App\Contracts\Classifications\Channel\Manager as ChannelManagerContract;
use App\Contracts\Classifications\Channel\Receiver as ChannelReceiverContract;

class Channel implements Arrayable, ArrayAccess, ChannelContract, ChannelManagerContract, ChannelReceiverContract, Countable, IteratorAggregate, Jsonable, JsonSerializable
{

    /**
     * 存储当前频道数据集
     *
     * @var \Illuminate\Support\Collection $channel
     */
    private $channels;

    /**
     * 存储数组形式的频道数据
     *
     * @var array $data
     */
    private $data = [];

    /**
     * 当前获取的频道的属性
     *
     * @var string $type
     */
    private $type = '';

    /**
     * 存储菜单所有项的数据
     *
     * @var array $default
     */
    public $default = [];

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
        if ($this->channels instanceof Collection) {

            // 先拿到第一个子级频道项,并拿到它的父级频道ID
            // 开始遍历整个频道栏目,但是跳过第一条记录
            // 当然,每当遇到父级频道ID与当前频道ID相同
            // 则该为根级频道,一次搜索完成
            $first = $this->channels->first(); $cursor = $first->channel_id;

            $iterator = $this->channels->getIterator();

            while ($iterator->valid() && $channel = $iterator->current()) {

                echo 'prepare' . PHP_EOL;

                if ($channel->channel_id == $cursor || $channel->flag === 1) { $iterator->next(); continue; }
                echo 'start' . PHP_EOL; var_dump($first->channel_id, $first->channel_parent);

                // 当一次搜索完成时,重新搜索数据集
                if (isset($_parent) && $_parent->channel_id === $_parent->channel_parent) {
                    echo 'rewind' . PHP_EOL; $iterator->rewind(); continue;
                }

                if ($channel->channel_id === $first->channel_parent) {

                    $_parent = $channel; echo 'merge' . PHP_EOL; var_dump($_parent->channel_id);

                    $this->{$_parent->channel_type}[$_parent->channel_name] = array_merge(
                        $this->{$_parent->channel_type}, ['data' => $first, 'idx' => $cursor, 'to' => $_parent->channel_id]
                    );

                    echo 'to wind' . PHP_EOL; var_dump($this->{$_parent->channel_type});
                    // 因为已经设置过子父级关系,则当前数据项设置为1
                    $cursor = $_parent->channel_id; $first = $_parent; $channel->flag = 1;

                }

                echo 'complete' . PHP_EOL; $iterator->next();

            }
        }

        return array_merge(['default' => $this->default], ['mega' => $this->mega]);
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
        return new \RecursiveArrayIterator($this->data);
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
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * 连接到存放channel数据集的指定数据库,并获取数据集
     *
     * @return \App\Widgets\Channel
     */
    public function connection()
    {
        /**
         * 获取频道数据集,按照父级频道ID倒序排列
         */
        $this->channels = ChannelModel::all()->sortByDesc(function ($channel) {
            return $channel['channel_parent'];
        });

        return $this;
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
     * @param int|string $identity
     * @return string
     */
    public function getChannelType($identity)
    {
        // 当标识符为频道名称时
        return $this->toArray();
    }

    /**
     * 获取该频道的父级频道
     *
     * @param string $property
     * @param string|int $value
     * @return string
     */
    public function getChannelParent($property, $value)
    {

    }

    /**
     * 获取该频道的父级频道及其上级频道
     *
     * @param string $selfname
     * @param int $index
     * @return array
     */
    public function getChannelFamily($selfname, $index)
    {
        // TODO: Implement getChannelFamily() method.
    }

    /**
     * 获取该频道的元数据,包括了URL和名称
     *
     * @param string $property
     * @param string $except
     * @return array|string
     */
    public function getChannelMeta($property, $except = '')
    {
        // TODO: Implement getChannelMeta() method.
    }

    /**
     * 列出与该频道相关的父级频道及其上级频道
     *
     * @param string $selfname
     * @param mixed $breadcrumb
     * @return array
     */
    public function listRelativelyChannel($selfname, $breadcrumb = null)
    {
        // 搜索路径
        $_path = $selfname . '.';

        foreach ($this->channels as $channel) {
            // 先找到当前频道所在的数据项,并拿到其父级频道的ID
            if ($channel->channel_name === $selfname) $_parent = $channel->channel_parent;

            // 如果存在其父级频道ID的值,则开始对比搜索
            // 拿到当前频道ID,与父级频道对比
            // 保存当前名字到搜索路径中
            if (isset($_parent)) {
                if ($_parent === ($idx = $channel->channel_id)) {
                    $_path .= $channel->channel_name . '.';

                    // 保存路径之后, 更改父级频道为当前父级频道的父级频道
                    $_parent = $channel->channel_parent;
                }

                continue;
            }
        }

//        if (!is_null($breadcrumb))

        return [rtrim($_path, '.')];
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
        return $this->toArray();
    }
}