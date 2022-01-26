<?php
/*
 * Класс для проверки Поиска
 */

class SearchCest
{
    /*
     * Проверяем поиск по ключевым словам
     */
    public function checkSearch(FunctionalTester $I)
    {
        $I->amOnPage('');
        $I->seeElement(".main-menu li:nth-child(5)");
        $I->click(".main-menu li:nth-child(5)");
//        $I->seeElement('.kr-btn.kr-btn--gray-gradient');
//        $I->click('.kr-btn.kr-btn--gray-gradient');
        $I->waitForElementVisible('Новостройки в Казахстане');
        $I->seeElement('.complex-card--not-empty');
        $I->seeNumberOfElements('.complex-card--not-empty',12);
    }
}