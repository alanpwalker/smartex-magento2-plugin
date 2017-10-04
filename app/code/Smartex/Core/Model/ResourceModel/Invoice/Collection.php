<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */
namespace Smartex\Core\Model\ResourceModel\Invoice;

/**
 * Invoice Collection
 *
 *
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_isPkAutoIncrement = false;

    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Smartex\Core\Model\Invoice', 'Smartex\Core\Model\ResourceModel\Invoice');
    }
}
