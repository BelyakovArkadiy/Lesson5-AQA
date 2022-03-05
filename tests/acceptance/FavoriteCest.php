<?php
use Step\Acceptance\Auth;
use Page\Acceptance\ComplexPage;
use Step\Acceptance\Favorite;
use Page\Acceptance\MainPage;
use Page\Acceptance\MyPage;

/**
 * Класс для проверки Избранных
 */
class FavoriteCest
{
    /**
     * Переход на поддомен десктопной версии перед выполнением тестов
     * Авторизация
     * Переход из ЛК на Главную
     *
     * @param Auth AcceptanceTester $I
     * @return void
     */
    public function _before(Auth $I)
    {
        $myPage = new MyPage($I);

        $I->amOnPage(MainPage::$URL_RELEASE);
        $I->setCookie('tutorialDisabled', 'true');
//        отключаем сторонние скрипты (QA)
        $I->setCookie('remote-resources-disable', '1');
        $I->authWithValidData();
        $I->waitForElementVisible(MyPage::$logoKrisha);
        $myPage->clickToLogoKrisha();
        $I->amOnPage(MainPage::$URL);
    }

    /**
     * Проверяем количество комплексов в Избранном
     *
     * @param Favorite AcceptanceTester $I
     * @return void
     */
    public function checkFavoriteComplex(Favorite $I)
    {
        $mainPage = new MainPage($I);

    $complexNb = 5;

        $mainPage->clickToTabOfComplex();
        $I->addComplexToFavorite($complexNb);
        $I->assertEquals($complexNb, $I->grabTextFrom(ComplexPage::$valueFavorite));
    }

    /**
     * Действия после каждого теста
     * Разлогиниться
     *
     * @param Auth AcceptanceTester $I
     * @return void
     */
    public function _after(Auth $I)
    {
        $I->logOut();
    }

}
