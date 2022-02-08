<?php
namespace Page\Acceptance;

/*
 * Страница Дачи
 */

class DachiPage
{
    /**
     * @var string
     * Урл главной страницы Дачи
     */
    public static $URL = '/prodazha/dachi/';

    /**
     * @var string
     * Урл Дачи Алматы
     */
    public static $URLDACHIALMATY = '/prodazha/dachi/almaty';

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
    public  static $btnChoice = '//*[@id="a-search-form"]/div[1]/div/div[4]/div/div/div/div/div/div/div/div/div[2]/div[2]/a';

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
