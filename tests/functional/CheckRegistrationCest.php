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

    /*
     * Авторизуемся валидными данными через Подачу
     */
    public function checkSuccessfulAuth(FunctionalTester $I)
    {
        $mainPage = new MainPage($I);
        $authPage = new AuthPage($I);
        $I->amOnPage('');
        $I->seeElement(MainPage::$tabAdvertAdd);
        $mainPage->clickToAddAdvert();
        $I->canSeeElement(AuthPage::$formRegistrations);
        $authPage->addLogin();
        $I->canSeeElement(AuthPage::$buttonContinue);
        $authPage->clickContinue();
        $I->canSeeElement(AuthPage::$fieldPassword);
        $authPage->addPassword();
        $I->canSeeElement(AuthPage::$buttonContinue);
        $authPage->clickContinue();
        $I->canSeeInCurrentUrl('https://new-master-kr.kolesa-team.org/my');

    }
}