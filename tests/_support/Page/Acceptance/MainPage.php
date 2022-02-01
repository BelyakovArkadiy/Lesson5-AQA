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
     * метод кликает на таб Новостройки
     */
    public function clickToTabOfComplex()
    {
        $this->acceptanceTester->click(self::$tabComplex);
    }
}
