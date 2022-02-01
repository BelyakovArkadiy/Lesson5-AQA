<?php

use Page\Functional\MainPage;
use Page\Functional\AuthPage;

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
        $mainPage = new MainPage($I);
        $I->amOnPage('');
        $I->seeElement(MainPage::$tabRegistrations);
        $mainPage->clickToRegistrations();
        $I->seeElement(AuthPage::$formRegistrations);
    }

    /*
     * Проверяем видимость формы Регистрации при переходе с Главной через "Подать объявление"
     */
    public function checkRegistrationFormVisible2(FunctionalTester $I)
    {
        $mainPage = new MainPage($I);
        $I->amOnPage('');
        $I->seeElement(MainPage::$tabAdvertAdd);
        $mainPage->clickToAddAdvert();
        $I->seeElement(AuthPage::$formRegistrations);
    }
}