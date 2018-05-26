<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../config.php';

    use Facebook\WebDriver\Chrome\ChromeDriver;
    use Facebook\WebDriver\WebDriverBy;
    use Facebook\WebDriver\WebDriverExpectedCondition;

    try {
        /** @var ChromeDriver $driver */
        $driver = ChromeDriver::start();


        $driver->get("https://example.com/form.php");

        $driver->findElement(WebDriverBy::id('id'))
               ->sendKeys('email');

        $driver->findElement(WebDriverBy::id('password'))
               ->sendKeys('pass');

        // ボタン押下
        $driver->findElement(WebDriverBy::id('form_submit'))
               ->click();

        // タイトルがHelloを含むものになるまで待つ
        $driver->wait()->until(
            WebDriverExpectedCondition::titleContains('Hello')
        );
    } catch (Exception $e) {
        die($e->getMessage());
    }