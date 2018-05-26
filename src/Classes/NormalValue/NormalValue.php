<?php
/**
 * Created by IntelliJ IDEA.
 */

namespace sudnonk\FormTester\NormalValue;


abstract class NormalValue {
    /**
     * @return string
     */
    abstract public function getName(): string;

    /**
     * @return mixed
     */
    abstract public function generateTestData();
}