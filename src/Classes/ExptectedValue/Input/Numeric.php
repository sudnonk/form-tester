<?php
/**
 * Created by IntelliJ IDEA.
 */

namespace sudnonk\FormTester\ExpectedValue\Input;

use sudnonk\FormTester\ExpectedValue as Expected;

class Numeric extends Expected\ExpectedValue {
    /** @var string $name <input type="hoge" name="$name">の$nameのとこ */
    private $name;

    /** @var int|float $minValue 最小の値 */
    private $minValue;
    /** @var int|float $maxValue 最大の値 */
    private $maxValue;
    /** @var bool $allowFloat floatを許すか */
    private $allowFloat;

    /**
     * Numeric constructor.
     *
     * @param string $name       <input type="hoge" name="$name">の$nameのとこ
     * @param int    $minValue   最小の値 $minValue <= $value <= $maxValue
     * @param int    $maxValue   最大の値 $minValue <= $value <= $maxValue
     * @param bool   $allowFloat floatを許すか
     */
    public function __construct(string $name, $minValue = PHP_INT_MIN, $maxValue = PHP_INT_MAX, bool $allowFloat = false) {
        $this->setName($name);
        $this->setMinValue($minValue);
        $this->setMaxValue($maxValue);
        $this->setAllowFloat($allowFloat);
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * @param float|int $minValue
     */
    private function setMinValue($minValue): void {
        $this->minValue = $minValue;
    }

    /**
     * @param float|int $maxValue
     */
    private function setMaxValue($maxValue): void {
        $this->maxValue = $maxValue;
    }

    /**
     * @param bool $allowFloat
     */
    private function setAllowFloat(bool $allowFloat): void {
        $this->allowFloat = $allowFloat;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return float|int
     */
    public function getMinValue() {
        return $this->minValue;
    }

    /**
     * @return float|int
     */
    public function getMaxValue() {
        return $this->maxValue;
    }

    /**
     * @return bool
     */
    public function isAllowFloat(): bool {
        return $this->allowFloat;
    }
}