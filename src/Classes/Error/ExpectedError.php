<?php

/**
 * Class ExpectedError
 * todo: HTMLタグパース機能とか
 */
class ExpectedError {
    /** @var string $error_msg エラーメッセージ */
    private $error_msg;

    public function __construct(string $error_msg) {
        $this->setErrorMsg($error_msg);
    }

    /**
     * @param string $error_msg
     */
    private function setErrorMsg($error_msg) {
        $this->error_msg = $error_msg;
    }

    /**
     * @return string
     */
    public function getErrorMsg() {
        return $this->error_msg;
    }
}