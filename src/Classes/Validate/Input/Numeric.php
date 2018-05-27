<?php
/**
 * Created by IntelliJ IDEA.
 */

namespace sudnonk\FormTester\Validate\Input;

use sudnonk\FormTester\Validate\Validate;
use sudnonk\FormTester\ExpectedValue\Input\Numeric as ExpectedNumeric;


class Numeric extends Validate {
    public static function isValid($value, $expected): bool {
        if (!(is_float($value) || is_int($value)) || !($expected instanceof ExpectedNumeric)) {
            throw new \InvalidArgumentException("check phpdoc.");
        }

        //小数を許可していないのに小数だったとき
        if (!$expected->isAllowFloat() && is_float($value)) {
            return false;
        }
        //値が範囲外だったとき
        if ($value < $expected->getMinValue() || $value > $expected->getMaxValue()) {
            return false;
        }

        return true;
    }
}