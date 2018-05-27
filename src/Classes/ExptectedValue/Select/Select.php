<?php
/**
 * Created by IntelliJ IDEA.
 */

namespace sudnonk\FormTester\ExpectedValue\Select;

use sudnonk\FormTester\ExpectedValue\ExpectedValue;

class Select extends ExpectedValue {
    /** @var string $name このフォーム部品の名前 */
    private $name;

    /** @var string[] 配列にあるべき値 */
    private $values;

    /**
     * ExpectedArrayValue constructor.
     *
     * @param string $name このフォーム部品の名前
     * @param array  $values
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(string $name, array $values) {
        $this->setName($name);

        foreach ($values as $key => $value) {
            if (is_string($key) && is_string($value)) {

            } else {
                throw new \InvalidArgumentException("check the parameters.");
            }
        }
        $this->setValues($values);
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void {
        $this->name = $name;
    }


    /**
     * @param string[] $values
     */
    private function setValues($values): void {
        $this->values = $values;
    }

    /**
     * @return string[]
     */
    public function getValues() {
        return $this->values;
    }


}