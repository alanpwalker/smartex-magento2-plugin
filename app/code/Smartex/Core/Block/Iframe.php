<?php

/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex\Core\Block;

class Iframe extends \Magento\Framework\View\Element\Template {
	protected $_smartexModel;
	/**
	 *
	 * @var \Smartex\Core\Helper\Data
	 */
	protected $_dataHelper;
	
	/**
	 *
	 * @param \Magento\Framework\View\Element\Template\Context $context        	
	 * @param \Smartex\Core\Model\Invoice $_smartexModel        	
	 * @param \Smartex\Core\Helper\Data $_dataHelper        	
	 * @param array $data        	
	 */
	public function __construct(\Magento\Framework\View\Element\Template\Context $context, \Magento\Framework\Registry $coreRegistry, \Smartex\Core\Model\Invoice $_smartexModel, \Smartex\Core\Helper\Data $_dataHelper, array $data = []) {
		$this->_smartexModel = $_smartexModel;
		$this->_dataHelper = $_dataHelper;
		$this->_coreRegistry = $coreRegistry;
		parent::__construct ( $context, $data );
	}
	
	/**
	 */
	protected function getHelper() {
		$smartexHelper = $this->_dataHelper;
		return $smartexHelper;
	}
	
	/**
	 * create an invoice and return the url so that iframe.phtml can display it
	 *
	 * @return string
	 */
	public function getFrameActionUrl() {
		$last_success_quote_id = $this->getLastQuoteId ();
		$invoiceFactory = $this->_smartexModel;
		$invoice = $invoiceFactory->load ( $last_success_quote_id, 'quote_id' );
		return $invoice->getData ( 'url' ) . '&view=model&v=2';
	}
	public function getLastQuoteId() {
		$lastSuccessQuoteId = $this->_coreRegistry->registry ( 'last_success_quote_id' );
		return $lastSuccessQuoteId;
	}
	public function getValidateUrl() {
		$validateUrl = $this->getUrl ( 'smartex/index/index' );
		return $validateUrl;
	}
	public function getSuccessUrl() {
		$successUrl = $this->getUrl ( 'checkout/onepage/success' );
		return $successUrl;
	}
	
	 public function logg($data) {
    	$writer = new \Zend\Log\Writer\Stream ( BP . '/var/log/payment_smartex.log' );
    	$logger = new \Zend\Log\Logger ();
    	$logger->addWriter ( $writer );
    	$logger->info ( print_r ( $data, true ) );
    }

    public function getCartUrl() {
		$cartUrl = $this->getUrl ( 'checkout/cart/index' );
		return $cartUrl;
	}

	public function isTestMode() {
		$mode = $this -> _scopeConfig -> getValue('payment/smartex/network', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		if ($mode == 'testnet') {
			return true;
		}
		return false;
	}
	
}
