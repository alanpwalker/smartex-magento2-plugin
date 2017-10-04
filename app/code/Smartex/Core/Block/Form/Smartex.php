<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */
namespace Smartex\Core\Block\Form;

use Magento\Customer\Helper\Session\CurrentCustomer;
use Magento\Framework\Locale\ResolverInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use \Smartex\Core\Helper\Data;

class Smartex extends \Magento\Payment\Block\Form
{
    
	/**
     * Payment method code
     *
     * @var string
     */
    protected $_methodCode = 'smartex';

    /**
     * @var null
     */
    protected $_config;


    /**
     * @var CurrentCustomer
     */
    protected $currentCustomer;

    protected function _construct()
    {
        
        $template = 'Smartex_Core::smartex/form/smartex.phtml';
        $this->setTemplate($template);
        parent::__construct();
    }

    
}