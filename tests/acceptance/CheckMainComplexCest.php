<?php

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
        $mainPage = new \Page\Acceptance\MainPage($I);
        $complexPage = new \Page\Acceptance\ComplexPage($I);
        $I->amOnPage(\Page\Acceptance\MainPage::$URL);
        $I->seeElement(\Page\Acceptance\MainPage::$tabComplex);
        $mainPage->clickToTabOfComplex();
        $I->canSeeInCurrentUrl(\Page\Acceptance\ComplexPage::$URL);
        $I->waitForElement(\Page\Acceptance\ComplexPage::$buttonCloseTheHint, 3);
        $complexPage->closeTheHint();
        $I->waitForElement(\Page\Acceptance\ComplexPage::$cardOfComplex, 3);
        $I->seeNumberOfElements(\Page\Acceptance\ComplexPage::$cardOfComplex, 12);
    }
    /*
     * Проверяем поиск ЖК за 1 тенге и нулевую выдачу
     */
    public function checkShowingAtLowCost(AcceptanceTester $I)
    {
        $complexPage = new \Page\Acceptance\ComplexPage($I);
        $I->amOnPage(\Page\Acceptance\ComplexPage::$URL);
        $I->waitForElement(\Page\Acceptance\ComplexPage::$buttonCloseTheHint, 3);
        $complexPage->closeTheHint()
                    ->clickFastFilter()
                    ->fillPriceTo()
                    ->clickShow();
        $I->waitForText("Ничего не найдено");

    }
}