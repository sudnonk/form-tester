<?php
/**
 * Created by IntelliJ IDEA.
 */

namespace sudnonk\FormTester\ExpectedValue\Input;

use sudnonk\FormTester\ExpectedValue as Expected;

class Text extends Expected\ExpectedValue {
    /** @var string $name <input type="hoge" name="$name">の$nameのとこ */
    private $name;

    /** @var int $maxLength 許容される最大の文字長 */
    private $maxLength;
    /** @var int $minLength 許容される最小の文字長 */
    private $minLength;
    /** @var bool $is_fullwidth 全角か半角か */
    private $is_fullwidth;
    /** @var string $regex 許容される文字列の正規表現 */
    private $regex;

    /**
     * Text constructor.
     *
     * @param string $name         <input type="hoge" name="$name">の$nameのとこ
     * @param int    $maxLength    許容される最大の文字長
     * @param int    $minLength    許容される最小の文字長
     * @param bool   $is_fullwidth 文字数を全角で計算するか半角で計算するか
     * @param string $regex        許容される文字列の正規表現
     */
    public function __construct(string $name, int $maxLength = PHP_INT_MAX, int $minLength = 0, bool $is_fullwidth = false, string $regex = "") {
        $this->setName($name);
        $this->setMaxLength($maxLength);
        $this->setMinLength($minLength);
        $this->setIsFullwidth($is_fullwidth);

        if (strlen($regex) > 0 && (@preg_match($regex, "") !== false)) {

        } else {
            throw new \InvalidArgumentException("Invalid regex value.");
        }
        $this->setRegex($regex);
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * @param int $maxLength
     */
    private function setMaxLength(int $maxLength): void {
        $this->maxLength = $maxLength;
    }

    /**
     * @param int $minLength
     */
    private function setMinLength(int $minLength): void {
        $this->minLength = $minLength;
    }

    /**
     * @param bool $is_fullwidth
     */
    private function setIsFullwidth(bool $is_fullwidth): void {
        $this->is_fullwidth = $is_fullwidth;
    }

    /**
     * @param string $regex
     */
    private function setRegex(string $regex): void {
        $this->regex = $regex;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getMaxLength(): int {
        return $this->maxLength;
    }

    /**
     * @return int
     */
    public function getMinLength(): int {
        return $this->minLength;
    }

    /**
     * @return bool
     */
    public function isFullwidth(): bool {
        return $this->is_fullwidth;
    }

    /**
     * @return bool
     */
    public function isRegexSet(): bool {
        return (strlen($this->getRegex()) > 0);
    }

    /**
     * @return string
     */
    public function getRegex(): string {
        return $this->regex;
    }
}