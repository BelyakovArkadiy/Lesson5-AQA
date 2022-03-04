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
    public function _before(Auth $auth)
    {
        $myPage = new MyPage($auth);

        $auth->amOnPage(MainPage::$URL_RELEASE);
        $auth->setCookie('tutorialDisabled', 'true');
//        отключаем сторонние скрипты (QA)
        $auth->setCookie('remote-resources-disable', '1');
        $auth->authWithValidData();
        $auth->waitForElementVisible(MyPage::$logoKrisha);
        $myPage->clickToLogoKrisha();
        $auth->amOnPage(MainPage::$URL);
    }

    /**
     * Проверяем количество комплексов в Избранном
     *
     * @param Favorite AcceptanceTester $I
     * @return void
     */
    public function checkFavoriteComplex( Favorite $favorite)
    {
        $mainPage = new MainPage($favorite);

        $mainPage->clickToTabOfComplex();
        $favorite->addComplexToFavorite();
        $favorite->assertEquals($favorite->getComplexNumber(), $favorite->grabTextFrom(ComplexPage::$valueFavorite));
    }

    /**
     * Действия после каждого теста
     * Разлогиниться
     *
     * @param Auth AcceptanceTester $I
     * @return void
     */
    public function _after( Auth $auth)
    {
        $auth->logOut();
    }

}
