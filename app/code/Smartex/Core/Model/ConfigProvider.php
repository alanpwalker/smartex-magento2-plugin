<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex\Core\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use \Magento\Customer\Helper\Session\CurrentCustomer;
use \Magento\Framework\UrlInterface;
use \Magento\Payment\Helper\Data as PaymentHelper;
use \Smartex\Core\Helper\Data as smartexHelper;

class ConfigProvider implements \Magento\Checkout\Model\ConfigProviderInterface
{


    /**
     * @var Config
     */
    private $config;
    /**
     * @var \Magento\Customer\Helper\Session\CurrentCustomer
     */
    protected $currentCustomer;

    /**
     * @var SmartexHelper
     */
    protected $smartexHelper;

    /**
     * Payment method code
     *
     * @var string
     */
    protected $methodCode;

    /**
     * @var \Magento\Payment\Model\Method\AbstractMethod
     */
    protected $method;

    /**
     * @var PaymentHelper
     */
    protected $paymentHelper;

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;


    /**
     * Constructor
     *
     * @param CurrentCustomer $currentCustomer
     * @param SmartexHelper $smartexHelper
     * @param PaymentHelper $paymentHelper
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        Config $config,
        CurrentCustomer $currentCustomer,
        SmartexHelper $smartexHelper,
        PaymentHelper $paymentHelper,
        UrlInterface $urlBuilder,
        $methodCode
    ) {
        $this->config = $config;
        $this->currentCustomer = $currentCustomer;
        $this->smartexHelper = $smartexHelper;
        $this->paymentHelper = $paymentHelper;
        $this->urlBuilder = $urlBuilder;
        $this->methodCode = $methodCode;
		$this->method = $this->paymentHelper->getMethodInstance($methodCode);
    }


    public function getConfig()
    {
       /* $config = [
            'payment' => [
                $this->methodCode => [
                    'fullScreen' => $this->config->getFullscreen(),//$this->getMethodRedirectUrl($this->methodCode)],
                ],
            ],
        ];
        // $config['payment']['redirectUrl'][$code] = $this->getMethodRedirectUrl($code);
        // $config['payment']['fullScreen'][$code] = $this->config->getValue('fullscreen');*/
        $config = [];
        return $config;
    }

    /**
     * Return redirect URL for method
     *
     * @param string $code
     * @return mixed
     */
    protected function getMethodRedirectUrl($code)
    {
        return $this->method->getOrderPlaceRedirectUrl();
    }

}