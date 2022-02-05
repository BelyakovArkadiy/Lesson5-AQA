<?php

use Page\Acceptance\MainPage;
use Page\Acceptance\ComplexPage;
use Page\Acceptance\AuthPage;
use Page\Acceptance\MyPage;
/*
 *  Класс для проверки главной страницы Новостроек
 */
class CheckMainComplexCest
{
    /*
     * Проверяем переход на страницу Новостроек и отображение карточек ЖК
     *
     */
    public function checkIssuanceOnTheMain(AcceptanceTester $I)
    {
        $mainPage = new MainPage($I);
        $complexPage = new ComplexPage($I);
        $I->amOnPage(MainPage::$URL);
        $I->seeElement(MainPage::$tabComplex);
        $mainPage->clickToTabOfComplex();

        $I->canSeeInCurrentUrl(ComplexPage::$URL);
        $I->waitForElement(ComplexPage::$buttonCloseTheHint);
        $complexPage->closeTheHint();
        $I->waitForElement(ComplexPage::$cardOfComplex);
        $I->seeNumberOfElements(ComplexPage::$cardOfComplex, 12);
    }

    /*
     * Проверяем поиск ЖК за 1 тенге и нулевую выдачу
     */
    public function checkSearchAndNullIssuance(AcceptanceTester $I)
    {
        $complexPage = new ComplexPage($I);
        $I->amOnPage(ComplexPage::$URL);
        $I->waitForElement(ComplexPage::$buttonCloseTheHint);
        $complexPage->closeTheHint()
                    ->clickFastFilter()
                    ->fillPriceTo()
                    ->clickShow();
        $I->waitForText("Ничего не найдено");
    }

    /*
     * Авторизуемся валидными данными через Подачу
     */
    public function checkSuccessfulAuth(AcceptanceTester $I)
    {
        $mainPage = new MainPage($I);
        $authPage = new AuthPage($I);
        $I->amOnPage('');
        $I->seeElement(MainPage::$tabAdvertAdd);
        $mainPage->clickToAddAdvert();
        $I->canSeeElement(AuthPage::$formRegistrations);
        $authPage->addLogin();
        $I->waitForElementVisible(AuthPage::$buttonContinue);
        $authPage->clickContinue();
        $I->waitForElementVisible(AuthPage::$fieldPassword);
        $authPage->addPassword();
        $I->waitForElementVisible(AuthPage::$buttonContinue);
        $authPage->clickContinue();
        $I->amOnUrl(MyPage::$URL);
    }
}