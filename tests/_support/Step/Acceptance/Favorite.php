<?php
namespace Step\Acceptance;
use Page\Acceptance\ComplexPage;

/**
 * Класс со StepObject для Избранных
 */

class Favorite extends \AcceptanceTester
{
    /**
     * Количество комплексов для добавления в Избранное
     */
    public const COMPLEX_NUMBER = 5;

    /**
     * Метод добавляет  комплексы в Избранное
     * @return void
     */
   public function addComplexToFavorite()
   {
       $I = $this;

       for ($i = 1; $i <= self::COMPLEX_NUMBER; $i++) {
           $I->waitForElementVisible(sprintf(ComplexPage::$favorite, $i));
           $I->click(sprintf(ComplexPage::$favorite, $i));
       }
   }

    /**
     * Метод возращает количество комплексов добавленных в Избранное
     * @return int
     */
    public function getComplexNumber()
    {

        return self::COMPLEX_NUMBER;
    }
}