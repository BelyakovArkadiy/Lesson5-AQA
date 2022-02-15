<?php

namespace Page\Acceptance;

    /*
     * Главная страница Новостроек
     */
class ComplexPage
{
    /*
     * Урл страницы Новостройки
     */
    public static $URL = '/complex/search/';

    /*
     * Селектор для закрытия подсказки по фильтру "ЖК в продаже"
     */
    public static $buttonCloseTheHint = '.kr-btn.kr-btn--gray-gradient';

    /*
     * Селектор для выбора быстрого фильтра
     */
    public static $fastFilter = 'button.complex-fast-filter__item:nth-child(2)';

    /*
     * Селектор карточки ЖК
     */
    public static $cardOfComplex = '.complex-card ';

    /*
     * Селектор фильтра "Цена До"
     */
    public static $filterPriceTo = '#complex-filter-price-to';

    /*
     * Селектор кнопки Показать
     */
    public static $buttonShow = '.kr-btn.kr-btn--blue';

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
     * метод закрывает подсказку для быстрого фильтра "ЖК в продаже"
     */
    public function closeTheHint()
    {
        $this->acceptanceTester->click(self::$buttonCloseTheHint);

        return $this;
    }

    /*
     * метод выбирает  быстрый фильтр
     */
    public function clickFastFilter()
    {
        $this->acceptanceTester->click(self::$fastFilter);

        return $this;
    }

    /*
     *
     */
    public static $priceMin = "1";

    /*
     * метод заполняет цифрами фильтр "Цена До"
     */
    public function fillPriceTo()
    {
        $this->acceptanceTester->fillField(self::$filterPriceTo, self::$priceMin);

        return $this;
    }

    /*
     * метод нажимает на кнопку "Показать"
     */
    public function clickShow()
    {
        $this->acceptanceTester->click(self::$buttonShow);

        return $this;
    }
}
