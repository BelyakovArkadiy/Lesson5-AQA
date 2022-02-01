<?php
namespace Page\Acceptance;

/*
 * Главная страница
 */
class MainPage
{
    /*
     * Урл Главной страницы
     */
    public static $URL = '';

    /*
     * Селектор на таб "Регистрация"
     */
    public static $tabRegistrations = '.registration-link-item>a';
     /*
     * Селектор на таб "Подать объявление"
     */
    public static $tabAdvertAdd = '.registration-link-item>a';

    /*
     * Селектор таба в Главном меню для перехода на страницу "Новостройки"
     */
    public static $tabComplex = ".main-menu li:nth-child(5)";

    /*
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
     * метод кликает на таб Регистрация
     */
    public function clickToRegistrations()
    {
        $this->acceptanceTester->click(self::$tabRegistrations);
    }

    /*
     * метод кликает на таб Подать объявления
     */
    public function clickToAddAdvert()
    {
        $this->acceptanceTester->click(self::$tabAdvertAdd);
    }

    /*
     * метод кликает на таб Новостройки
     */
    public function clickToTabOfComplex()
    {
        $this->acceptanceTester->click(self::$tabComplex);
    }
}
