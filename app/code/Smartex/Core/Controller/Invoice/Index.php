<?php

/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */
namespace Smartex\Core\Controller\Invoice;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

/**
 * @route smartex/invoice/
 */
class Index extends \Magento\Framework\App\Action\Action {
	protected $_smartexHelper;
	protected $_smartexModel;
	protected $_checkoutSession;
	/**
	 * Core registry
	 *
	 * @var \Magento\Framework\Registry
	 */
	protected $_coreRegistry;
	protected $configResource;
	protected $resultPageFactory;
	public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry, \Smartex\Core\Helper\Data $_smartexHelper, \Smartex\Core\Model\Invoice $_smartexModel, \Magento\Framework\App\Config\MutableScopeConfigInterface $config, \Magento\Framework\View\Result\PageFactory $resultPageFactory) {
		$this->_coreRegistry = $coreRegistry;
		$this->_smartexHelper = $_smartexHelper;
		$this->_smartexModel = $_smartexModel;
		$this->config = $config;
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct ( $context );
	}
	
	/**
	 * @route Smartex invoice url
	 */
	public function execute() {
		
		$objectmanager = \Magento\Framework\App\ObjectManager::getInstance ();
		$quote = $objectmanager->get ( '\Magento\Checkout\Model\Session' );		
		if (empty($quote->getData ( 'last_success_quote_id' ))) {
			return $this->_redirect ( 'checkout/cart' );
		}
		
		$this->_coreRegistry->register ( 'last_success_quote_id', $quote->getData ( 'last_success_quote_id' ) );
		
		if ($this->config->getValue ( 'payment/smartex/fullscreen' )) {
			$invoiceFactory = $this->_smartexModel;
			$invoice = $invoiceFactory->load ( $quote->getData ( 'last_success_quote_id' ), 'quote_id' );
			$resultRedirect = $this->resultFactory->create ( ResultFactory::TYPE_REDIRECT );
			$resultRedirect->setUrl ( $invoice->getData ( 'url' ) );
			return $resultRedirect;
		} else {
			$resultPage = $this->resultPageFactory->create ();
			$resultPage->getConfig ()->getTitle ()->set ( __ ( 'Pay with Ethereum' ) );
			return $resultPage;
		}
	}
}
