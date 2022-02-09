<?php
use Page\Acceptance\MainPage;
use Page\Acceptance\DachiPage;
use Codeception\Example;

/**
 * Класс для поиска Дачи для покупки
 */
class CheckSearchDachiCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage(MainPage::$URL_RELEASE);
        $I->setCookie('tutorialDisabled', 'true');
//        отключаем сторонние скрипты (QA)
        $I->setCookie('remote-resources-disable', '1');
    }

    /**
     * @param AcceptanceTester $I
     * @param Example $data
     * Проверяем поиск Дачи по регионам Казахстана
     * @return void
     * @dataProvider getDataSearchRegion
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

    }

    protected function getDataSearchRegion()
    {
        return [
            ['region' => 'almaty', 'url' => 'almaty'],
            ['region' => 'nur-sultan', 'url' => 'nur-sultan'],
            ['region' => 'almatinskaja-oblast', 'url' => 'almatinskaja-oblast'],
            ['region' => 'shymkent', 'url' => 'shymkent'],
            ['region' => 'karagandinskaja-oblast', 'url' => 'karagandinskaja-oblast']
        ];
    }
}