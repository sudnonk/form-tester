<?php
/**
 * Created by IntelliJ IDEA.
 */

namespace sudnonk\FormTester\NormalValue\Input;

use sudnonk\FormTester\NormalValue\NormalValue;
use sudnonk\FormTester\ExpectedValue\Input\Numeric as ExpectedNumeric;
use sudnonk\FormTester\Validate\Input as Validate;

class Numeric extends NormalValue {
    /** @var ExpectedNumeric $expected */
    private $expected;
    /** @var int|float $testData */
    private $testData;

    public function __construct(ExpectedNumeric $expected, $testData) {
        $this->setExpected($expected);

        if ($testData !== null) {
            if (!Validate\Number::isValid($testData, $this->expected)) {
                throw new \InvalidArgumentException("\$testData doesn't satisfy \$expected.");
            }
            if (is_int($testData)) {
                $this->setTestData($testData);
            } elseif (is_float($testData)) {
                if ($this->expected->isAllowFloat()) {
                    $this->setTestData($testData);
                } else {
                    throw new \InvalidArgumentException("Float is not allowed in your \$expected.");
                }
            } else {
                throw new \InvalidArgumentException("\$testData must be Integer or Float.");
            }
        } else {
            $this->setTestData($testData);
        }
    }

    /**
     * @param \sudnonk\FormTester\ExpectedValue\Input\Numeric $expected
     */
    private function setExpected(ExpectedNumeric $expected): void {
        $this->expected = $expected;
    }

    /**
     * @param float|int $testData
     */
    private function setTestData($testData): void {
        $this->testData = $testData;
    }

    public function getName(): string {
        return $this->expected->getName();
    }

    /**
     * @return float|int
     */
    public function generateTestData() {
        if ($this->testData !== null) return $this->testData;

        do {
            $testData = mt_rand($this->expected->getMinValue(), $this->expected->getMaxValue());
            if ($this->expected->isAllowFloat()) {
                $testData += mt_rand(1, 99) / 100;
            }
        } while (!Validate\Number::isValid($testData, $this->expected));

        return $testData;
    }

}