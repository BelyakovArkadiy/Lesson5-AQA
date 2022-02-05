<?php
namespace Page\Functional;

class MainPage
{
    // include url of current page
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
     * метод кликает на таб Регистрация
     */
    public function clickToRegistrations()
    {
        $this->functionalTester->click(self::$tabRegistrations);
    }

    /*
     * метод кликает на таб Подать объявление
     */
    public function clickToAddAdvert()
    {
        $this->functionalTester->click(self::$tabAdvertAdd);
    }

}
