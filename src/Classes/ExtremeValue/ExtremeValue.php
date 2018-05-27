<?php
/**
 * Created by IntelliJ IDEA.
 */

namespace sudnonk\FormTester\ExtremeValue;


abstract class ExtremeValue {
    abstract public function getName(): string;

    abstract public function generateOverflowData();

    abstract public function generateUnderflowData();

    abstract public function generateInvalidData();
}