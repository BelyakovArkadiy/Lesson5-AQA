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
        $I->amOnPage('');
        $I->seeElement(".main-menu li:nth-child(5)");
        $I->click(".main-menu li:nth-child(5)");
        $I->waitForElement('.tutorial__descr--visible', 3);
        $I->click('.tutorial__descr--visible');
        $I->waitForElement('.complex-card--not-empty', 3);
        $I->seeNumberOfElements('.complex-card--not-empty', 12);
    }
}