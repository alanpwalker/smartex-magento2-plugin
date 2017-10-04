<?php
/**
 * @license Copyright 2016-2017 Smartex.io Ltd., MIT License
 * 
 */

namespace Smartex\Core\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
	
        $installer = $setup;

        $installer->startSetup();

		/**
         * IPN Log Table, used to keep track of incoming IPNs
         */

        $table = $installer->getConnection()->newTable(
            $installer->getTable('smartex_ipns')
        )
		->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false, 'primary' => true],
            'smartex_ipns'
        )
		->addColumn(
            'invoice_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '200',
            [],
            'Invoice Id'
        )
		->addColumn(
            'url',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '400',
            [],
            'URL'
        )
        ->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '20',
            [],
            'Status'
        )
        ->addColumn(
            'eth_price',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '16,8',
            [],
            'ETH Price'
        )
        ->addColumn(
            'price',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '16,8',
            [],
            'Price'
        )
        ->addColumn(
            'currency',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '10',
            [],
            'Currency'
        )
        ->addColumn(
            'invoice_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '11',
            [],
            'Invoice Time'
        )
        ->addColumn(
            'expiration_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '11',
            [],
            'Expiration Time'
        )
        ->addColumn(
            'current_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '11',
            [],
            'Current Time'
        )
        ->addColumn(
            'pos_data',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '255',
            [],
            'POS Data'
        )
        ->addColumn(
            'eth_paid',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '16,8',
            [],
            'ETH Paid'
        )
        ->addColumn(
            'rate',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '16,8',
            [],
            'Rate'
        )
        ->addColumn(
            'exception_status',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '255',
            [],
            'Exception Status'
        )
		->setComment('Smartex Core smartex_ipns')
        ->setOption('type', 'InnoDB')
        ->setOption('charset', 'utf8');
		
		$installer->getConnection()->createTable($table);


        /**
         * Table used to keep track of invoices that have been created. The
         * IPNs that are received are used to update this table.
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('smartex_invoices')
        )
        ->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            64,
            ['nullable' => false, 'primary' => true, 'auto_increment' => false],
            'smartex_invoices'
        )
        ->addColumn(
            'quote_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '11',
            [],
            'Quote Id'
        )
        ->addColumn(
            'increment_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '11',
            [],
            'Increment Id'
        )
        ->addColumn(
            'updated_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [],
            'Updated At'
        )
        ->addColumn(
            'url',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '200',
            [],
            'URL'
        )
        ->addColumn(
            'pos_data',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '255',
            [],
            'POS Data'
        )
        ->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '20',
            [],
            'Status'
        )
        ->addColumn(
            'eth_price',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '16,8',
            [],
            'ETH Price'
        )
        ->addColumn(
            'eth_due',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '16,8',
            [],
            'ETH Due'
        )
        ->addColumn(
            'price',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '16,8',
            [],
            'Price'
        )
        ->addColumn(
            'currency',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '10',
            [],
            'Currency'
        )
        ->addColumn(
            'ex_rates',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '255',
            [],
            'Ex Rates'
        )
        ->addColumn(
            'order_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64',
            [],
            'Order Id'
        )
        ->addColumn(
            'invoice_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '11',
            [],
            'Invoice Time'
        )
        ->addColumn(
            'expiration_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '11',
            [],
            'Expiration Time'
        )
        ->addColumn(
            'current_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '11',
            [],
            'Current Time'
        )
        ->addColumn(
            'eth_paid',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '16,8',
            [],
            'ETH Paid'
        )
        ->addColumn(
            'rate',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '16,8',
            [],
            'Rate'
        )
        ->addColumn(
            'exception_status',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '255',
            [],
            'Exception Status'
        )
        ->addColumn(
            'token',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '164',
            [],
            'Token'
        )    
        ->setComment('Smartex Core smartex_invoices')
        ->setOption('type', 'InnoDB')
        ->setOption('charset', 'utf8');
        
        $installer->getConnection()->createTable($table);

        $installer->endSetup();

    }
}
