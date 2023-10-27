<?php

namespace app\controller;

use app\model\Bar;

class Inbar
{
    protected $one;

    public function __construct(Bar $one)
    {
        $this->one = $one;
    }

    public function index()
    {
        return $this->one->name;
    }
}