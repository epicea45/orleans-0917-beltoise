<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 24/10/17
 * Time: 16:57
 */

namespace Beltoise\Model;


class Renov
{
    private $id;
    private $imageBefore;
    private $imageAfter;
    private $text;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImageBefore()
    {
        return $this->imageBefore;
    }

    /**
     * @param mixed $imageBefore
     */
    public function setImageBefore($imageBefore)
    {
        $this->imageBefore = $imageBefore;
    }

    /**
     * @return mixed
     */
    public function getImageAfter()
    {
        return $this->imageAfter;
    }

    /**
     * @param mixed $imageAfter
     */
    public function setImageAfter($imageAfter)
    {
        $this->imageAfter = $imageAfter;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}