<?php

namespace x3y\LaravelJieba\Facades;

use Illuminate\Support\Facades\Facade;
use Fukuball\Jieba\Jieba as Accessor;

class Jieba extends Facade
{
    public static function getFacadeAccessor()
    {
        return Accessor::class;
    }
}