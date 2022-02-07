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
