<?php

use Page\Acceptance\DachiPage;
use Codeception\Example;
use Page\Acceptance\MainPage;

/**
 * Класс для поиска Дачи для покупки
 */
class CheckSearchDachiCest
{

    /**
     * Переход на поддомен десктопной версии перед выполнением тестов
     *
     * @param \AcceptanceTester $I
     */
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage(MainPage::$URL_RELEASE);
        $I->setCookie('tutorialDisabled', 'true');
//        отключаем сторонние скрипты (QA)
        $I->setCookie('remote-resources-disable', '1');
    }

    /**
     * Проверяем поиск Дачи по регионам Казахстана
     * @dataProvider getDataSearchRegion
     * @return void
     * @param AcceptanceTester $I
     * @param Example $data
     */
    public function searchDachaInKz(AcceptanceTester $I, Example $data)
    {
        $dachiPage = new DachiPage($I);

        $I->amOnPage(DachiPage::$URL);
        $I->waitForElementVisible(DachiPage::$chooseRegion);
        $dachiPage->clickToChoiceRegion();
        $I->waitForElementVisible(sprintf(DachiPage::$region, $data['region']));
        $I->click(sprintf(DachiPage::$region, $data['region']));
        $I->waitForElementVisible(DachiPage::$btnChoice);
        $I->click(DachiPage::$btnChoice);
        $I->waitForElementVisible(DachiPage::$btnSeeResult);
        $dachiPage->clickToSeeResult();
        $I->canSeeInCurrentUrl($data['url']);
        $I->waitForText($data['header']);
    }

    /**
     * Возвращает масссив данных : регион, url, заголовок
     * @return string[][]
     */
    protected function getDataSearchRegion()
    {
        return [
            ['region' => 'almaty', 'url' => 'almaty', 'header'=> 'Продажа дач в Алматы'],
            ['region' => 'nur-sultan', 'url' => 'nur-sultan', 'header' => 'Продажа дач в Нур-Султане (Астана)'],
            ['region' => 'almatinskaja-oblast', 'url' => 'almatinskaja-oblast', 'header' => 'Продажа дач в Алматинской обл.'],
            ['region' => 'shymkent', 'url' => 'shymkent', 'header' => 'Продажа дач в Шымкенте'],
            ['region' => 'karagandinskaja-oblast', 'url' => 'karagandinskaja-oblast', 'header' => 'Продажа дач в Карагандинской обл.']
        ];
    }
}