<?php

namespace AppBundle\Service;

use AppBundle\Entity\Day;
use AppBundle\Entity\Week;
use Doctrine\ORM\EntityManager;

/**
 * Class      WeekManager
 * @package   AppBundle\Service
 * @category  AppBundle
 * @author    Brice VICO <brice.vico@orange.fr>
 * @copyright 2017
 */
class WeekManager
{
    /**
     * Return week pre-populate with days.
     *
     * @return Week
     */
    public function getWeekWithBaseDays()
    {
        $week = new Week();

        for ($i = 1; $i <= 7; $i++) {
            $day = new Day();

            $day->setWeek($week);
            $day->setDay($i);
            $week->getDays()->add($day);
        }

        return $week;
    }
}