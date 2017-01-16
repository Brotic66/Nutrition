<?php

namespace AppBundle\Repository;
use AppBundle\Entity\Category;
use Doctrine\ORM\QueryBuilder;

/**
 * Class      CookRepository
 * @package   AppBundle\Repository
 * @category  AppBundle
 * @author    Brice VICO <brice.vico@orange.fr>
 * @copyright 2017
 */
class CookRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Find breakfast cook.
     *
     * @return QueryBuilder
     */
    public function findBreakfastCook()
    {
        return $this->GetQueryBuilderByCategoryName(Category::BREAKFAST);
    }

    /**
     * Find breakfast cook.
     *
     * @return QueryBuilder
     */
    public function findLunchCook()
    {
        return $this->GetQueryBuilderByCategoryName(Category::LUNCH);
    }

    /**
     * Find breakfast cook.
     *
     * @return QueryBuilder
     */
    public function findSnackCook()
    {
        return $this->GetQueryBuilderByCategoryName(Category::SNACK);
    }

    /**
     * Find breakfast cook.
     *
     * @return QueryBuilder
     */
    public function findDinnerCook()
    {
        return $this->GetQueryBuilderByCategoryName(Category::DINNER);
    }


    /**
     * Get Cook filtered by Category name.
     *
     * @param $categoryName string Name of category.
     *
     * @return QueryBuilder
     */
    private function GetQueryBuilderByCategoryName($categoryName)
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.category', 'category')
            ->where('category.name = :categoryName')
            ->setParameter(':categoryName', $categoryName)
            ->orderBy('c.name');
    }
}
