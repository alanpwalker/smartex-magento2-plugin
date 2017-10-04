<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Smartex\Core\Block;

/**
 * Base payment iformation block
 */
class Info extends \Magento\Payment\Block\Info
{

    /**
     * @var string
     */
    protected $_template = 'Smartex_Core::smartex/info/default.phtml';

    public function getSmartexInvoiceUrl()
    {
        $order       = $this->getInfo()->getOrder();
        $smartexHelper = \Magento\Framework\App\ObjectManager::getInstance()->get('\Smartex\Core\Helper\Data');
        $smartexModelInvoice = \Magento\Framework\App\ObjectManager::getInstance()->get('\Smartex\Core\Model\Invoice');

        if (false === isset($order) || true === empty($order)) {
            $smartexHelper->debugData('[ERROR] In Smartex\Core\Block\Info::getSmartexInvoiceUrl(): could not obtain the order.');
            throw new \Exception('In Smartex\Core\Block\Info::getSmartexInvoiceUrl(): could not obtain the order.');
        }

        $incrementId = $order->getIncrementId();

        if (false === isset($incrementId) || true === empty($incrementId)) {
            $smartexHelper->debugData('[ERROR] In Smartex\Core\Block\Info::getSmartexInvoiceUrl(): could not obtain the incrementId.');
            throw new \Exception('In Smartex\Core\Block\Info::getSmartexInvoiceUrl(): could not obtain the incrementId.');
        }

        $smartexInvoice = $smartexModelInvoice->load($incrementId, 'increment_id');

        if (true === isset($smartexInvoice) && false === empty($smartexInvoice)) {
            return $smartexInvoice->getUrl();
        }
    }
    
}
