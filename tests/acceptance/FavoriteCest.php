<?php
use Page\Acceptance\ComplexPage;
use Step\Acceptance\Auth;
use Page\Acceptance\MainPage;
use Page\Acceptance\MyPage;
use Step\Acceptance\Favorite;

/**
 * Класс для проверки Избранных
 */
class FavoriteCest
{
    /**
     * Переход на поддомен десктопной версии перед выполнением тестов
     * Авторизация
     * @param Auth AcceptanceTester $I
     * @return void
     */
    public function _before(AcceptanceTester $I, Auth $auth)
    {
        $I->amOnPage(MainPage::$URL_RELEASE);
        $I->setCookie('tutorialDisabled', 'true');
//        отключаем сторонние скрипты (QA)
        $I->setCookie('remote-resources-disable', '1');
        $auth->authWithValidData();
    }

    /**
     * Проверяем количество комплексов в Избранном
     * @param AcceptanceTester $I
     * @return void
     */
    public function checkFavoriteComplex(AcceptanceTester $I, Favorite $favorite)
    {
        $myPage = new MyPage($I);
        $mainPage = new MainPage($I);

        $I->waitForElementVisible(MyPage::$logoKrisha);
        $myPage->clickToLogoKrisha();
        $I->amOnPage(MainPage::$URL);
        $mainPage->clickToTabOfComplex();
        $favorite->addComplexToFavorite();
        $I->assertEquals($favorite->getComplexNumber(), $I->grabTextFrom(ComplexPage::$valueFavorite));
    }

    /**
     * Действия после каждого теста
     * Разлогиниться
     * @param Auth AcceptanceTester $I
     * @return void
     */
    public function _after(AcceptanceTester $I, Auth $auth)
    {
        $auth->logOut();
    }

}
