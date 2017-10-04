<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */
namespace Smartex\Core\Model\ResourceModel\Ipn;

/**
 * Ipn Collection
 *
 * 
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Smartex\Core\Model\Ipn', 'Smartex\Core\Model\ResourceModel\Ipn');
    }
}
