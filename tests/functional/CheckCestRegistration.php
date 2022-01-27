<?php
/*
 * Класс для проверки Регистрации пользователя
 */

class CheckCestRegistration
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
}