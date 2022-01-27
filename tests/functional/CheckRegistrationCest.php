<?php

/*
 * Класс для проверки Регистрации пользователя
 */
class CheckRegistrationCest
{
    /*
     * Проверяем видимость формы Регистрации при переходе с Главной через "Регистрацию"
     */
    public function checkRegistrationFormVisible(FunctionalTester $I)
    {
        $I->amOnPage('');
        $I->seeElement(".registration-link-item>a");
        $I->click(".registration-link-item>a");
        $I->seeElement('.signin-form');
    }

    /*
     * Проверяем видимость формы Регистрации при переходе с Главной через "Подать объявление"
     */
    public function checkRegistrationFormVisible2(FunctionalTester $I)
    {
        $I->amOnPage('');
        $I->seeElement(".btn.btn-default ");
        $I->click(".btn.btn-default");
        $I->seeElement('.signin-form');
    }
}