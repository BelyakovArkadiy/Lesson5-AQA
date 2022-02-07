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

/**
 * Общий класс для тестов фронтенда.
 */

    /**
     * Переход на поддомен десктопной версии перед выполнением тестов
     *
     * @param \AcceptanceTester $I
     */
    public function _before(AcceptanceTester $I)
    {
//        $I->switchToFrontendApp();
//
//        $this->prepareWebDriver($I);

//        $I->amOnPage(MainPage::$URLRELEASE);
//
//        $I->setCookie('tutorialDisabled', 'true');
////
//////         отключаем сторонние скрипты (QA)
//        $I->setCookie('remote-resources-disable', '1');
////
//        // отключаем центральную рекомендацию чтобы не мешала тестам
//        $I->setCookie('h-PP-CBr', 'testing');
//
//        // отключаем чертополох
//        $I->setCookie('thistleMock', 'true');

    }

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
}