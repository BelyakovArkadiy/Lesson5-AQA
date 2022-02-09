<?php
namespace Page\Acceptance;

/*
 * Страница Дачи
 */

class DachiPage
{
    /**
     * @var string
     * Урл главной страницы Дачи в продаже
     */
    public static $URL = '/prodazha/dachi/';

    /**
     * @var string
     * Урл Дачи Алматы в продаже
     */
    public static $URL_DACHI_ALMATY = '/prodazha/dachi/almaty';

    /**
     * Локатор выбора региона
     *
     */
    public  static $chooseRegion = ".region-dropdown-label";

    /**
     * Локатор Алматы
     *
     */
    public  static $almaty = "//*[@data-alias='almaty']";

    /**
     * Локатор кнопки Выбрать
     *
     */
    public  static $btnChoice = "//a[@class='btn btn-primary region-dropdown-action region-dropdown-action-apply']";

    /**
     * Локатор кнопки Показать результаты
     *
     */
    public  static $btnSeeResult = ".btn-submit.search-btn-main";




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
     * метод кликает на линк Выбор города
     */
    public function clickToChoiceCity()
    {
        $this->acceptanceTester->click(self::$chooseRegion);

    }
     /*
     * метод кликает на линк Показать результаты
     */
    public function clickToSeeResult()
    {
        $this->acceptanceTester->click(self::$btnSeeResult);
    }

}
