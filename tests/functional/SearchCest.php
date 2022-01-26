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
//        $I->seeElement('.page__header-view .link--border.link');
//        $I->click('.page__header-view .link--border.link');
//        $I->seeNumberOfElements('.col-6',60);
    }
}