<?php

namespace Page\Acceptance;

    /*
     * Страница Личного кабинет
     */
class MyPage
{
   /*
    * Урл личного кабинета
    */
    public static $URL = 'https://new-master-kr.kolesa-team.org/my';

    /*
    * Селектор линка Кабинет
    */
    public static $linkCabinet = "//a[@href='#'][contains(text(),'Кабинет')]";

    /*
    * Селектор
    */
    public static $infoAboutUser = "//li[@class='text-item' and 'Курт Кобейн']";




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
}
