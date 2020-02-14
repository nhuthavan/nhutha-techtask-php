<?php

namespace App\Common;

abstract class BaseService
{
    protected $result;

    public function __construct()
    {
        $this->result = [];

        return $this;
    }

    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function excessDate($date, $today)
    {
        if (strtotime($date) >= strtotime($today)) {
            return false;
        }
        return true;
    }
}