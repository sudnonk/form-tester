<?php
/**
 * Created by IntelliJ IDEA.
 */

namespace sudnonk\FormTester\Validate\Input;

use sudnonk\FormTester\ExpectedValue\Input\Text as ExpectedText;
use sudnonk\FormTester\Validate\Validate;


class Text extends Validate {
    /**
     * @param string                                       $value    テストしたい文字列
     * @param \sudnonk\FormTester\ExpectedValue\Input\Text $expected その文字列が満たすべき仕様
     *
     * @return bool 仕様を満たしていればtrue、違えばfalse
     */
    public static function isValid($value, $expected): bool {
        if (!is_string($value) || !($expected instanceof ExpectedText)) {
            throw new \InvalidArgumentException("check phpdoc.");
        }

        $length = strlen($value);
        if ($length < $expected->getMinLength() || $length > $expected->getMaxLength()) {
            return false;
        }
        if ($expected->isRegexSet()) {
            if (preg_match($expected->getRegex(), $value) !== 1) {
                return false;
            }
        }

        return true;
    }
}