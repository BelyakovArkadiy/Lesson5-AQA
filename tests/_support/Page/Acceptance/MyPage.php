<?php

namespace Page\Acceptance;

    /**
     * Страница Личного кабинет
     */
class MyPage
{
   /**
    * Урл личного кабинета
    */
    public static $URL = 'https://new-master-kr.kolesa-team.org/my';

    /**
    * Селектор линка Кабинет
    */
    public static $linkCabinet = "//a[@href='#'][contains(text(),'Кабинет')]";

    /**
    * Селектор
    */
    public static $infoAboutUser = "//li[@class='text-item' and 'Курт Кобейн']";

    /**
     * Селектор лого Крыша
     */
    public static $logoKrisha = "//a[@class='logo']//*[name()='svg']";

    /**
     * Селектор таба Выход
     */
    public static $logOut = "//a[@href='/signout']";




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

    /**
     * Метод кликает на логотип Крыша для перехода на Главную страницу
     * @return void
     */

    public function clickToLogoKrisha()
    {
     $this->acceptanceTester->click(self::$logoKrisha);

     return $this;

    }

    /**
     * Метод кликает на таб Кабинет
     * @return $this
     */
    public function clickToTabCabinet(){
        $this->acceptanceTester->click(self::$linkCabinet);

        return $this;
    }

    public function clickLogOut(){
        $this->acceptanceTester->click(self::$logOut);

        return $this;
    }



}
