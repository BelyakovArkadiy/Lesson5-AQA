<?php

use Page\Functional\MainPage;
use Page\Functional\AuthPage;
use Codeception\Module\REST;

/**
 * Класс для проверки Регистрации/Авторизации пользователя
 */
class CheckRegistrationCest
{
    /**
     * Проверяем видимость формы Регистрации при переходе с Главной через "Регистрацию"
     */
    public function checkRegistrationFormVisible(FunctionalTester $I)
    {
        $mainPage = new MainPage($I);
        $I->amOnPage('');
        $I->seeElement(MainPage::$tabRegistrations);
        $mainPage->clickToRegistrations();
        $I->amOnUrl(AuthPage::$URL);
        $I->seeElement(AuthPage::$formRegistrations);
    }

    /**
     * Проверяем видимость формы Регистрации при переходе с Главной через "Подать объявление"
     */
    public function checkRegistrationFormVisible2(FunctionalTester $I)
    {
        $mainPage = new MainPage($I);
        $I->amOnPage('');
        $I->seeElement(MainPage::$tabAdvertAdd);
        $mainPage->clickToAddAdvert();
        $I->amOnUrl(AuthPage::$URL);
        $I->seeElement(AuthPage::$formRegistrations);
    }

    /**
     * Проверяем ответ сервера при авторизации  валидными данными
     *
     * @group ApiCest
     */
    public function checkAuthWithValidData(FunctionalTester $I) {
        $expectedJsonShema =[
            'status' => 'string',
            'userId' => 'integer',
            'token'  => 'string',
            'oaCode' => 'null'

        ];
        $userData = [
            'login'    => 'DosMukasan@mail.kz',
            'password' => '123123',
            'project'  => 'krisha',
            'csrf'     => "test"
        ];

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('https://id.kolesa-team.org/login.json', $userData);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson(['status' => "ok"]);
        $I->seeResponseMatchesJsonType($expectedJsonShema);
    }

    /**
     * Проверяем ответ сервера при авторизации невалидными данными
     * 
     * @group ApiCest
     */
    public function checkAuthWithInvalidPassword(FunctionalTester $I){
        $userDataInvalid = [
            'login'    => 'InvalidLogin',
            'password' => '1234567890',
            'project'  => 'krisha',
            'csrf'     => "test"
        ];

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('https://id.kolesa-team.org/login.json', $userDataInvalid);
        $I->seeResponseCodeIsClientError();
        $I->seeResponseContainsJson(['status' => "error"]);
    }
}