<?php
namespace Page\Functional;

class AuthPage
{
    /*
     * Валидный логин
     */
    public const VALIDLOGIN = "87773823535";

    /*
     * Валидный пароль
     */
    public const VALIDPASSWORD = "123123";

    /*
     * Урл страницы регистрации/авторизации
     */
    public static $URL = 'https://id.kolesa.kz/login/?destination=https%3A%2F%2Fkrisha.kz%2Fmy';

    /*
     * Селектор формы регистрации/авторизации
     */
    public static $formRegistrations = '.signin-form';

    /*
     * Селектор поля Логин
     */
    public static $fieldLogin = '#login';

    /*
     * Селектор кнопки Продолжить
     */
    public static $buttonContinue = '.ui-button';

    /*
     * Селектор поля Пароль
     */
    public static $fieldPassword = 'input[type=password]';


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

    /*
     * метод заполнения поле Логин
     */
    public function addLogin()
    {
        $this->functionalTester->fillField(self::$fieldLogin,self::VALIDLOGIN);

        return $this;
    }

    /*
     * метод заполнения поле Пароль
     */
    public function addPassword()
    {
        $this->functionalTester->fillField(self::$fieldPassword,self::VALIDPASSWORD);

        return $this;
    }

    /*
     * метод нажимает кнопку Продолжить
     */
    public function clickContinue()
    {
        $this->functionalTester->click(self::$buttonContinue);

        return $this;
    }
}
