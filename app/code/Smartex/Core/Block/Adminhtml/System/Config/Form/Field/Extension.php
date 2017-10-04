<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

/**
 * This is used to display php extensions and if they are installed or not
 */
namespace Smartex\Core\Block\Adminhtml\System\Config\Form\Field;

use Magento\Framework\Data\Form\Element\AbstractElement;

class Extension extends \Magento\Config\Block\System\Config\Form\Field
{
    /**
     * Render element html
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        if (false === isset($element) || true === empty($element)) {
            $helper = \Magento\Framework\App\ObjectManager::getInstance()->get('Smartex\Core\Helper\Data');
            $helper->debugData('[ERROR] In Smartex\Core\Block\Adminhtml\System\Config\Form\Field\Extension::_getElementHtml(): Missing or invalid $element parameter passed to function.');
            throw new \Exception('In Smartex\Core\Block\Adminhtml\System\Config\Form\Field\Extension::_getElementHtml(): Missing or invalid $element parameter passed to function.');
        }

        $config = $element->getFieldConfig();
        $phpExtension = isset($config['php_extension']) ? $config['php_extension'] : 'null';
       
        if (true === in_array($phpExtension, get_loaded_extensions())) {
            return 'Installed';
        }

        return 'Not Installed';
    }
}
