<?php
/**
 * Created by IntelliJ IDEA.
 */

namespace sudnonk\FormTester\ExtremeValue\Input;

use sudnonk\FormTester\ExpectedValue\Input\Text as ExpectedText;
use sudnonk\FormTester\ExtremeValue\ExtremeValue;

class Text extends ExtremeValue {
    /** @const string TEST_CHAR テスト用につかう文字 */
    const TEST_CHAR = "a";

    /** @var  ExpectedText $expected */
    private $expected;

    /**
     * Text constructor.
     *
     * @param \sudnonk\FormTester\ExpectedValue\Input\Text $expected
     */
    public function __construct(ExpectedText $expected) {
        $this->expected = $expected;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->expected->getName();
    }

    /**
     * @return string
     */
    public function generateOverflowData() {
        return str_repeat(self::TEST_CHAR, PHP_INT_MAX);
    }

    /**
     * @return string
     */
    public function generateUnderflowData() {
        return "";
    }

    /**
     * @return string
     */
    public function generateInvalidData() {
        /** todo 文字を想定しているところで試すべき不正な値とは？ */
        if ($this->expected->isRegexSet()) return "";

        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789';
        do {
            $str = '';
            for ($i = 0; $i < 10; ++$i) {
                $str .= $chars[mt_rand(0, 61)];
            }
        } while (preg_match($this->expected->getRegex(), $str) === 1);

        return $str;

    }


}