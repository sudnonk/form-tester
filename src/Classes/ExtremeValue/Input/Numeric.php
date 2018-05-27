<?php
/**
 * Created by IntelliJ IDEA.
 */

namespace sudnonk\FormTester\ExtremeValue\Input;


use sudnonk\FormTester\ExtremeValue\ExtremeValue;
use sudnonk\FormTester\ExpectedValue\Input\Numeric as ExpectedNumeric;


class Numeric extends ExtremeValue {
    /** @const string INVALID_STRING 不正な値として用いる文字列 */
    const INVALID_STRING = "aaaaa";
    /** @const float INVALID_FLOAT 不正な値として用いるfloat */
    const INVALID_FLOAT = (float)"3.141592";

    /** @var \sudnonk\FormTester\ExpectedValue\Input\Numeric $expected */
    private $expected;

    /**
     * Numeric constructor.
     *
     * @param \sudnonk\FormTester\ExpectedValue\Input\Numeric $expected
     */
    public function __construct(ExpectedNumeric $expected) {
        $this->setExpected($expected);
    }

    /**
     * @param \sudnonk\FormTester\ExpectedValue\Input\Numeric $expected
     */
    private function setExpected(ExpectedNumeric $expected): void {
        $this->expected = $expected;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->expected->getName();
    }

    /**
     * @return float|int
     */
    public function generateOverflowData() {
        if ($this->expected->isAllowFloat()) {
            return PHP_FLOAT_MAX;
        } else {
            return PHP_INT_MAX;
        }
    }

    /**
     * @return float|int
     */
    public function generateUnderflowData() {
        if ($this->expected->isAllowFloat()) {
            return PHP_FLOAT_MIN;
        } else {
            return PHP_INT_MIN;
        }
    }

    /**
     * @return float|string
     */
    public function generateInvalidData() {
        if ($this->expected->isAllowFloat()) {
            return self::INVALID_STRING;
        } else {
            return self::INVALID_FLOAT;
        }
    }


}