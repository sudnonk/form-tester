<?php

    use Facebook\WebDriver\Remote\RemoteWebElement;

    class InputForm {
        private $element;

        function __construct(RemoteWebElement $element) {
            $this->element = $element;
        }
    }

    class InputNumber extends InputForm {
        /** @var int $min 入力できる(はずの)最小値 */
        private $min;
        /** @var int $max 入力できる(はずの)最大値 */
        private $max;

        private $

        /**
         * InputNumber constructor.
         *
         * @param RemoteWebElement $element そのエレメント。$driver->findElement()の返り値
         * @param string           $expected_error 範囲外だった時にどんなメッセージが出るはずか
         * @param int              $min 入力できる(はずの)最小値
         * @param int              $max 入力できる(はずの)最大値
         * @example new InputNumber($element,"0から100の間で入力してください",0,100) //値は0から100の間しか受け付けないはず
         * @example new InputNumber($element,"0以上の数字を入力してください",0) //値は0以上のはず
         */
        function __construct(RemoteWebElement $element,string $expected_error,int $min = PHP_INT_MIN,int $max = PHP_INT_MAX) {
            parent::__construct($element);
            $this->min = $min;
            $this->max = $max;
        }
    }
    class InputText extends InputForm {

    }
    class InputSelect extends InputForm {

    }