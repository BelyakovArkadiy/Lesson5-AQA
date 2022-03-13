<?php
namespace Step\Acceptance;

use Page\Acceptance\AuthPage;
use Page\Acceptance\MainPage;
use Page\Acceptance\MyPage;

/**
 * Класс со StepObjects для входа/выхода из ЛК
 */
class AuthStep extends \AcceptanceTester
{
    /**
     * Метод авторизации валидными данными
     *
     * @return void
     */
    public function authWithValidData(){
        $I = $this;
        $mainPage = new MainPage($I);
        $authPage = new AuthPage($I);


        $I->amOnPage(MainPage::$URL);
        $I->seeElement(MainPage::$tabAdvertAdd);
        $mainPage->clickToAddAdvert();
        $I->waitForElementVisible(AuthPage::$formRegistrations);
        $authPage->addLogin();
        $I->waitForElementVisible(AuthPage::$buttonContinue);
        $authPage->clickContinue();
        $I->waitForElementVisible(AuthPage::$fieldPassword);
        $authPage->addPassword();
        $I->waitForElementVisible(AuthPage::$buttonContinue);
        $authPage->clickContinue();

    }

    /**
     * Метод разлогинивающий пользователя
     *
     * @return void
     */
    public function logOut(){
        $I =$this;
        $myPage = new MyPage($I);

        $I->waitForElementVisible(MyPage::$linkCabinet);
        $myPage->clickToTabCabinet();
        $I->waitForElementVisible(MyPage::$logOut);
        $myPage->clickLogOut();

    }

}