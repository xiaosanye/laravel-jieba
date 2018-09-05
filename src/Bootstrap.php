<?php

namespace x3y\LaravelJieba;

ini_set('memory_limit', '1024M');

use Fukuball\Jieba\Jieba as Jieba;
use Fukuball\Jieba\Finalseg as Finalseg;
use Fukuball\Jieba\JiebaAnalyse as JiebaAnalyse;
use Fukuball\Jieba\Posseg as Posseg;

// 集成类
class Bootstrap
{
    public $jieba;
    public $finalseg;
    public $jiebaAnalyse;
    public $posseg;
    public $dic;            // Array 分词使用词典（大中小三种）
    public $user_dic;       // Path 用户自定义词典

    public function __construct($option){  // 可以加一些配置参数
        //实例化
        $this->jieba = new Jieba();
        $this->finalseg = new Finalseg();
        $this->jiebaAnalyse = new JiebaAnalyse();
        $this->posseg = new Posseg();

        // 初始化
        $this->jieba->init();
        $this->finalseg->init();
        // $this->jiebaAnalyse->init();     // 词性分析
        // $this->posseg->init();           // 词频分析

        $this->dictionary = ['dict' => 'small'];                    // 默认使用小词典

        $this->x3y_dic = dirname(__FILE__).'/dict/user_dict.txt';  // 用户自定义词典
        $this->jieba->loadUserDict($this->x3y_dic);                // 载入自定义词典

        $this->user_dic = storage_path('/dict/user_dict.txt');  // 用户自定义词典
        $this->jieba->loadUserDict($this->user_dic);                // 载入自定义词典
    }

    public function jieba(){

        return $this->jieba;
    }

    public function finalseg(){

        return $this->finalseg;
    }

    public function jiebaAnalyse(){

        return $this->jiebaAnalyse;
    }

    public function posseg(){

        return $this->posseg;
    }
}