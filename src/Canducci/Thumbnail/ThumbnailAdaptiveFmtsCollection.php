<?php namespace Canducci\Thumbnail;

use Canducci\Thumbnail\Contracts\IThumbnailAdaptiveFmtsCollection;

class ThumbnailAdaptiveFmtsCollection implements IThumbnailAdaptiveFmtsCollection
{
    protected $items = array();
    protected $index = 0;

    public function __construct($array)
    {

        $this->items = $array;

    }

    public function current()
    {

        return $this->items[$this->index];

    }

    public function next()
    {

        ++$this->index;

    }

    public function key()
    {

        return $this->index;

    }

    public function valid()
    {

        return ($this->index < $this->count());

    }

    public function rewind()
    {

        $this->index = 0;

    }

    public function count()
    {

        return count($this->items);

    }

    public function toArray()
    {

        $arr = array();

        foreach($this->items as $itt)
        {

            $arr[] = $itt->toArray();

        }

        return $arr;

    }
    public function toJson()
    {

        return json_encode($this->toArray(), JSON_PRETTY_PRINT);

    }

}