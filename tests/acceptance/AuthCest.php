<?php

use Page\Acceptance\MainPage;
use Page\Acceptance\ComplexPage;
use Page\Acceptance\AuthPage;
use Page\Acceptance\MyPage;

/*
 *  Класс для проверки Авторизации
 */
class AuthCest
{
        /**
         * Авторизуемся невалидным паролем
         */
    public function checkAuthWithInvalidPassword(AcceptanceTester $I)
    {
        $mainPage = new MainPage($I);
        $authPage = new AuthPage($I);

        $I->amOnPage(MainPage::$URL);
        $I->seeElement(MainPage::$tabAdvertAdd);
        $mainPage->clickToAddAdvert();
        $I->waitForElementVisible(AuthPage::$formRegistrations);
        $authPage->addLogin();
        $I->waitForElementVisible(AuthPage::$buttonContinue);
        $authPage->clickContinue();
        $I->waitForElementVisible(AuthPage::$fieldPassword);
        $authPage->addInvalidPassword();
        $I->waitForElementVisible(AuthPage::$buttonContinue);
        $authPage->clickContinue();
        $I->waitForElementVisible(AuthPage::$alertDanger);
    }

    /**
     * Авторизуемся валидными данными через Подачу
     */
    public function checkSuccessfulAuth(AcceptanceTester $I)
    {
        $mainPage = new MainPage($I);
        $authPage = new AuthPage($I);

        $I->amOnPage(MainPage::$URL);
        $I->seeElement(MainPage::$tabAdvertAdd);
        $mainPage->clickToAddAdvert();
        $I->waitForElementVisible(AuthPage::$formRegistrations);
        $authPage->addLogin();
        $I->waitForElementVisible(AuthPage::$buttonContinue);
        $authPage->clickContinue();
        $I->waitForElementVisible(AuthPage::$fieldPassword);
        $authPage->addPassword();
        $I->waitForElementVisible(AuthPage::$buttonContinue);
        $authPage->clickContinue();
        $I->waitForElementVisible(MyPage::$linkCabinet);
        $I->click(MyPage::$linkCabinet);
        $I->waitForElementVisible(MyPage::$infoAboutUser);
    }


}