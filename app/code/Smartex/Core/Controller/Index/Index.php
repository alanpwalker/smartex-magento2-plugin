<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */
namespace Smartex\Core\Controller\Index;

use Magento\Framework\App\Action\Context;
/**
 * @route smartex/index/
 */
class Index extends \Magento\Framework\App\Action\Action
{
    protected $_smartexHelper;

    protected $_smartexModel;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Smartex\Core\Helper\Data $_smartexHelper,\Smartex\Core\Model\Ipn $_smartexModel
    ) {
        parent::__construct($context);
        $this->_smartexHelper = $_smartexHelper;
        $this->_smartexModel = $_smartexModel;
    }


    /**
     * @route smartex/index/index?quote=n
     */
    public function execute()
    {
        $params  = $this->getRequest()->getParams();
        $quoteId = $params['quote'];
        $this->_smartexHelper->registerAutoloader();
        $this->_smartexHelper->debugData(json_encode($params));
        $paid = $this->_smartexModel->GetQuotePaid($quoteId);

        $this->_view->loadLayout();

        $this->getResponse()->setHeader('Content-type', 'application/json');
        
        $this->getResponse()->setBody(json_encode(array('paid' => $paid)));
    }
}
