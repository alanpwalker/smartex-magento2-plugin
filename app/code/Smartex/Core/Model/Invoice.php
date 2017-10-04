<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex\Core\Model;

use Magento\Framework\Exception\SampleException;

/**
 * Invoicetab model
 */
class Invoice extends \Magento\Framework\Model\AbstractModel
{

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\Db $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * @return void
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init('Smartex\Core\Model\ResourceModel\Invoice');
    }

    /**
     * Adds data to model based on an Invoice that has been retrieved from
     * Smartex's API
     *
     * @param Smartex\Invoice $invoice
     * @return \Smartex\Core\Model\Invoice
     */
    public function prepareWithSmartexInvoice($invoice,$order)
    {
        $objectmanager = \Magento\Framework\App\ObjectManager::getInstance();
        $helper = $objectmanager->get('\Smartex\Core\Helper\Data');
        if (false === isset($invoice) || true === empty($invoice)) {
            $helper->debugData('[ERROR] In Smartex\Core\Model\Invoice::prepareWithSmartexInvoice(): Missing or empty $invoice parameter.');
            throw new \Exception('In Smartex\Core\Model\Invoice::prepareWithSmartexInvoice(): Missing or empty $invoice parameter.');
        }
        $objectmanager->create('\Smartex\Core\Model\Invoice')->setData(
            array(
                'id'               => $invoice->getId(),
                'url'              => $invoice->getUrl(),
                'pos_data'         => $invoice->getPosData(),
                'status'           => $invoice->getStatus(),
                'eth_price'        => $invoice->getEthPrice(),
                'price'            => $invoice->getPrice(),
                'currency'         => $invoice->getCurrency()->getCode(),
                'order_id'         => $invoice->getOrderId(),
                'invoice_time'     => intval($invoice->getInvoiceTime() / 1000),
                'expiration_time'  => intval($invoice->getExpirationTime() / 1000),
                'current_time'     => intval($invoice->getCurrentTime() / 1000),
                'eth_paid'         => $invoice->getEthPaid(),
                'rate'             => $invoice->getRate(),
                'exception_status' => $invoice->getExceptionStatus(),
            )
        );

        if (false === isset($order) || true === empty($order)) {
            $helper->debugData('[ERROR] In Smartex\Core\Model\Invoice::prepateWithOrder(): Missing or empty $order parameter.');
            throw new \Exception('In Smartex\Core\Model\Invoice::prepateWithOrder(): Missing or empty $order parameter.');
        }

        $this->setData(
            array(
                'quote_id'     => $order['quote_id'],
                'increment_id' => $order['increment_id'],
            )
        );
        return $this;
    }

    /**
     * Adds information to based on the order object inside magento
     *
     * @param Mage_Sales_Model_Order $order
     * @return Smartex_Core_Model_Invoice
     */
    public function prepareWithOrder($order)
    {
        $objectmanager = \Magento\Framework\App\ObjectManager::getInstance();
        $helper = $objectmanager->get('\Smartex\Core\Helper\Data');
        if (false === isset($order) || true === empty($order)) {
            $helper->debugData('[ERROR] In Smartex\Core\Model\Invoice::prepateWithOrder(): Missing or empty $order parameter.');
            throw new \Exception('In Smartex\Core\Model\Invoice::prepateWithOrder(): Missing or empty $order parameter.');
        }
        
        $this->setData(
            array(
                'quote_id'     => $order['quote_id'],
                'increment_id' => $order['increment_id'],
            )
        );

        return $this;
    }

   
}