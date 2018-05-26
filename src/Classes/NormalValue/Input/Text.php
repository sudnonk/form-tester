<?php
/**
 * Created by IntelliJ IDEA.
 */

namespace sudnonk\FormTester\NormalValue\Input;

use sudnonk\FormTester\ExpectedValue\Input\Text as ExpectedText;
use sudnonk\FormTester\NormalValue\NormalValue;
use sudnonk\FormTester\Validate\Input as Validate;

/**
 * Class Text
 *
 * @package sudnonk\FormTester\NormalValue\Input
 */
class Text extends NormalValue {
    /** @var string FULLWIDTH_CHAR テストデータに用いる全角文字 */
    const FULLWIDTH_CHAR = "あ";
    /** @var string HALFWIDTH_CHAR テストデータに用いる半角文字 */
    const HALFWIDTH_CHAR = "a";

    /** @var ExpectedText $expected */
    private $expected;
    /** @var string $testData */
    private $testData;

    /**
     * Text constructor.
     *
     * @param ExpectedText $expected ExpectedValue\Input\Text
     * @param string       $testData テストデータとして用いたい、$expectedの制限を満たす文字列。$expectedにRegexpがセットされている場合は必須
     */
    public function __construct(ExpectedText $expected, string $testData = null) {
        $this->setExpected($expected);

        if ($testData === null) {
            if ($this->expected->isRegexSet()) {
                throw new \RuntimeException("You should set testData that satisfies \$expected->regexp.");
            } else {
                $this->setTestData($testData);
            }
        } else {
            if (Validate\Text::isValid($testData, $this->expected)) {
                $this->setTestData($testData);
            } else {
                throw new \RuntimeException("Given testData doesn't satisfy the \$expected.");
            }
        }
    }

    /**
     * @param ExpectedText $expected
     */
    private function setExpected(ExpectedText $expected): void {
        $this->expected = $expected;
    }

    /**
     * @param string $testData
     */
    private function setTestData(string $testData): void {
        $this->testData = $testData;
    }


    /**
     * このフォーム部品のnameを返す
     *
     * @return string
     */
    public function getName(): string {
        return $this->expected->getName();
    }

    /**
     * ExpectedTextで期待される範囲内のテストデータを適当に生成し、返却する
     *
     * @return string
     */
    public function generateTestData(): string {
        if ($this->testData !== null) return $this->testData;

        $length = mt_rand($this->expected->getMinLength(), $this->expected->getMaxLength());

        do {
            if ($this->expected->isFullwidth()) {
                $testData = str_repeat(self::FULLWIDTH_CHAR, $length);
            } else {
                $testData = str_repeat(self::HALFWIDTH_CHAR, $length);
            }
        } while (!Validate\Text::isValid($testData, $this->expected));

        return $testData;
    }
}