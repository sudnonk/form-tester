<?php
/**
 * Created by IntelliJ IDEA.
 */

namespace sudnonk\FormTester\Validate;


abstract class Validate {
    abstract public static function isValid($value, $expected): bool;
}