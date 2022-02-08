<?php
use Page\Acceptance\MainPage;
use Page\Acceptance\DachiPage;

/**
 * Класс для поиска Дачи
 */
class CheckSearchDachiCest
    {
            public function _before(AcceptanceTester $I)
            {
                $I->amOnPage(MainPage::$URLRELEASE);
//
        $I->setCookie('tutorialDisabled', 'true');

//        отключаем сторонние скрипты (QA)
        $I->setCookie('remote-resources-disable', '1');
            }

    /**
     * @param AcceptanceTester $I
     * @return void
     * Проверяем поиск Дачи по городам Казахстана
     */
            public function seachDachainKz(AcceptanceTester $I)
            {
                $dachiPage = new DachiPage($I);
                $I->amOnPage(DachiPage::$URL);
                $I->waitForElementVisible(DachiPage::$chooseRegion);
                $dachiPage->clickToChoiceCity();
                $I->waitForElementClickable(DachiPage::$almaty);
                $I->click(DachiPage::$almaty);
                $I->waitForElementVisible(DachiPage::$btnChoice);
                $I->click(DachiPage::$btnChoice);
                $I->waitForElementClickable(DachiPage::$btnSeeResult);
                $dachiPage->clickToSeeResult();
                $I->canSeeInCurrentUrl(DachiPage::$URLDACHIALMATY);


            }
    }
