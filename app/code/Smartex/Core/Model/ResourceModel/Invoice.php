<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */
namespace Smartex\Core\Model\ResourceModel;

/**
 * Invoice resource
 */
class Invoice extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('smartex_invoices', 'id');
    }

  
}
