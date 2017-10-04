<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */
namespace Smartex\Core\Controller\Iframe;

use Magento\Framework\App\Action\Context;
/**
 * @route smartex/index/
 */
class Index extends \Magento\Framework\App\Action\Action
{
    protected $_smartexHelper;

    protected $_smartexModel;
    protected $configResource;
    protected $quoteFactory;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $cart;


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Smartex\Core\Helper\Data $_smartexHelper,\Smartex\Core\Model\Ipn $_smartexModel,\Magento\Framework\App\Config\MutableScopeConfigInterface $config,\Magento\Checkout\Model\Cart $cart,\Magento\Quote\Model\QuoteFactory $quoteFactory
    ) {
        $this->config  = $config;
        $this->_smartexHelper = $_smartexHelper;
        $this->_smartexModel = $_smartexModel;
        $this->cart = $cart;
        $this->quoteFactory = $quoteFactory;
        parent::__construct($context);
    }


    /**
     * @route smartex/iframe/index
     */
    public function execute()
    {
    
        if($this->config->getValue('payment/smartex/fullscreen')){
            $html = 'You will be transfered to <a href="https://smartex.io" target="_blank\">Smartex</a> to complete your purchase when using this payment method.';
        }else{
            
            $html = '';
        }
        
        $this->getResponse()->setBody(json_encode(array('html' => $html)));
    }

}
