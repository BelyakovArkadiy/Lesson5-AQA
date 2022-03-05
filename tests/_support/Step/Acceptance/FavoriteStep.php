<?php
namespace Step\Acceptance;
use Page\Acceptance\ComplexPage;

/**
 * Класс со StepObject для Избранных
 */
class FavoriteStep extends \AcceptanceTester
{
    /**
     * Метод добавляет  комплексы в Избранное
     *
     * @return void
     */
   public function addComplexToFavorite($complexNb)
   {
       $I = $this;

       for ($i = 1; $i <= $complexNb; $i++) {
           $I->waitForElementVisible(sprintf(ComplexPage::$favorite, $i));
           $I->click(sprintf(ComplexPage::$favorite, $i));
       }
   }
}