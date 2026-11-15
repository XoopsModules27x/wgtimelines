<?php

declare(strict_types=1);

namespace XoopsModules\Wgtimelines;

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * wgTimelines module for xoops
 *
 * @copyright      XOOPS Project https://xoops.org/
 * @license        GPL 3.0 or later
 * @package        wgtimelines
 * @author         Goffy (wedega.com) - Email:<webmaster@wedega.com> - Website:<https://xoops.wedega.com>
 */

use XoopsModules\Wgtimelines;
// use XoopsModules\Wggallery\Constants;

\defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object Handler WgtimelinesRatings
 */
class RatingsHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     *
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'wgtimelines_ratings', Ratings::class, 'rate_id', 'rate_itemid');
    }

    /**
     * @param bool $isNew
     *
     * @return Object
     */
    public function create($isNew = true): Object
    {
        return parent::create($isNew);
    }

    /**
     * retrieve a field
     *
     * @param $id
     * @param $fields
     * @return \XoopsObject|null reference to the {@link Get} object
     */
    public function get($id = null, $fields = null): ?\XoopsObject
    {
        return parent::get($id, $fields);
    }

    /**
     * get inserted id
     *
     * @return integer reference to the {@link Get} object
     */
    public function getInsertId(): int
    {
        return $this->db->getInsertId();
    }

    /**
     * Get Rating per item in the database
     * @param int $rate_itemid
     * @return array
     */
    public function getItemRating(int $rate_itemid = 0): array
    {
        $ItemRating = [];

        $rating_unitwidth = 25;
        $max_units = 5;

        $criteria   = new \Criteria('rate_itemid', $rate_itemid);
        $helper = \XoopsModules\Wgtimelines\Helper::getInstance();
        $ratingObjs = $helper->getHandler('ratings')->getObjects($criteria);

        $uid            = \is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->getVar('uid') : 0;
        $count          = \count($ratingObjs);
        $current_rating = 0;
        $voted          = false;
        $ip             = getenv('REMOTE_ADDR');

        foreach ($ratingObjs as $ratingObj) {
            $current_rating += $ratingObj->getVar('rate_value');
            if ($ratingObj->getVar('rate_ip') == $ip || ($uid > 0 && $uid == $ratingObj->getVar('rate_uid'))) {
                $voted = true;
            }
        }
        unset($ratingObj);

        $ItemRating['uid']            = $uid;
        $ItemRating['nb_ratings']     = $count;
        $ItemRating['avg_rate_value'] = 0;
        if ($count > 0) {
            $ItemRating['avg_rate_value'] = number_format($current_rating / $count, 2);
        }
        $text = \str_replace('%c', (string)$ItemRating['avg_rate_value'], \_MD_WGTIMELINES_RATING_CURRENT);
        $text = \str_replace('%m', (string)$max_units, $text);
        $text = \str_replace('%t', (string)$ItemRating['nb_ratings'], $text);
        $ItemRating['text']    = $text;
        $ItemRating['size']    = ($ItemRating['avg_rate_value'] * $rating_unitwidth) . 'px';
        $ItemRating['maxsize'] = ($max_units * $rating_unitwidth) . 'px';
        $ItemRating['voted']   = $voted;
        $ItemRating['ip']      = $ip;

        return $ItemRating;
    }

    /**
     * Get Criteria Ratings
     * @param $crRatings
     * @param $start
     * @param $limit
     * @param $sort
     * @param $order
     * @return mixed
     */
    private function getRatingsCriteria($crRatings, $start, $limit, $sort, $order): mixed
    {
        $crRatings->setStart($start);
        $crRatings->setLimit($limit);
        $crRatings->setSort($sort);
        $crRatings->setOrder($order);
        return $crRatings;
    }
}
