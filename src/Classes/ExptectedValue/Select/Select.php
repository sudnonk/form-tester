<?php
/**
 * Created by IntelliJ IDEA.
 */

namespace sudnonk\FormTester\ExpectedValue\Select;

use sudnonk\FormTester\ExpectedValue as Expected;
use sudnonk\FormTester\ExpectedValue\Input as ExpectedInput;

class Select extends Expected\ExpectedValue {
    /** @var ExpectedInput\Text[] | ExpectedInput\Numeric[] 配列にあるべき値 */
    private $values;

    /**
     * ExpectedArrayValue constructor.
     *
     * @param array $values
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(array $values) {
        foreach ($values as $key => $value) {
            if (is_string($key) && ($value instanceof ExpectedInput\Text || $value instanceof ExpectedInput\Numeric)) {

            } else {
                throw new \InvalidArgumentException("check the parameters.");
            }
        }
        $this->setValues($values);
    }

    /**
     * @param ExpectedInput\Numeric[]|ExpectedInput\Text[] $values
     */
    private function setValues($values): void {
        $this->values = $values;
    }

    /**
     * @return ExpectedInput\Numeric[]|ExpectedInput\Text[]
     */
    public function getValues() {
        return $this->values;
    }


}