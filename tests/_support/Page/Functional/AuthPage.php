<?php
namespace Page\Functional;

class AuthPage
{
    /*
     * Урл страницы регистрации/авторизации
     */
    public static $URL = 'https://id.kolesa-team.org/login/';

    /*
     * Селектор формы регистрации/авторизации
     */
    public static $formRegistrations = '.signin-form';

    /*
     * объект Тестера
     *
     * @var \FunctionalTester;
     */
    protected $functionalTester;

    /*
     * метод контструктора
     */
    public function __construct(\FunctionalTester $I)
    {
        $this->functionalTester = $I;
    }
}
