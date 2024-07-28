<?php
/**
 * HH_StoreLocator Module 
 *
 * @category    StoreLocator Functionality
 * @package     HH_StoreLocator
 * @author      Patrick Flores
 *
 */

namespace HH\StoreLocator\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();
        $table = $installer->getConnection()->newTable(
            $installer->getTable('hh_store_locator')
        )->addColumn(
            'entity_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Store ID'
        )->addColumn(
            'stores_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Store Name'
        )->addColumn(
            'stores_address',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Store Address'
        )->addColumn(
            'stores_description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Store Description'    
        )->addColumn(
            'stores_lat',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Store Latitude'
        )->addColumn(
            'stores_long',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Store Longtitude'        
        )->addColumn(
            'stores_hours',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Store Hours'
        )->addColumn(
            'stores_phone',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Store Phone'    
        )->addColumn(
            'is_active',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            [],
            'Status'
        )->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT,
            ],
            'Creation Date'
        )->addColumn(
            'update_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [],
            'Modification Date'
        )->setComment(
            'HH Store Locator'
        );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}