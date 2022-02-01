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
     * Селектор быстрого фильтра ( сразу после фильтра "ЖК в продаже")
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
     * метод кликает на подсказку по фильтру "ЖК в продаже"
     */
    public function closeTheHint()
    {
        $this->acceptanceTester->click(self::$buttonCloseTheHint);

        return $this;
    }
    /*
     * метод кликает на быстрый фильтр
     */
    public function clickFastFilter()
    {
        $this->acceptanceTester->click(self::$fastFilter);

        return $this;
    }
    /*
     * метод вводит в фильтр "Цена До" стоимость
     */
    public function fillPriceTo()
    {
        $this->acceptanceTester->fillField(self::$filterPriceTo, 1);

        return $this;
    }
    public function clickShow()
    {
        $this->acceptanceTester->click(self::$buttonShow);

        return $this;
    }
}
