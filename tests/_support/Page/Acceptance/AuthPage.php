<?php
namespace Page\Acceptance;

    /*
     * Страница Авторизации/Регистрации
     */
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
     * Невалидный пароль
     */
    public const INVALIDPASSWORD = "123456";

    /*
     * Урл страницы регистрации/авторизации
     */
    public static $URL = 'https://id.kolesa-team.org/login/?destination=https%3A%2F%2Fnew-master-kr.kolesa-team.org%2Fpassport%2Fregister';

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
     * Селектор поля Пароль
     */
    public static $alert = '.alert.alert-danger';

    /**
     * объект Тестера
     *
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    /*
     * метод контструктора
     */
    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

    /*
     * метод заполнения поле Логин
     */
    public function addLogin()
    {
        $this->acceptanceTester->fillField(self::$fieldLogin,self::VALIDLOGIN);

        return $this;
    }

    /*
     * метод заполнения поле Пароль валидным паролем
     */
    public function addPassword()
    {
        $this->acceptanceTester->fillField(self::$fieldPassword,self::VALIDPASSWORD);

        return $this;
    }

    /*
     * метод заполнения поле Пароль невалидными данными
     */
    public function addInvalidPassword()
    {
        $this->acceptanceTester->fillField(self::$fieldPassword,self::INVALIDPASSWORD);

        return $this;
    }

    /*
     * метод нажимает кнопку Продолжить
     */
    public function clickContinue()
    {
        $this->acceptanceTester->click(self::$buttonContinue);

        return $this;
    }
}
