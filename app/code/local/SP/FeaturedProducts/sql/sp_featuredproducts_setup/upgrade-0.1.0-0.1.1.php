<?php

/** @var Mage_Catalog_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

$installer->getConnection()
          ->addColumn(
              $installer->getTable('sp_featuredproducts/featured'),
              'name',
              [
                  'type'        => Varien_Db_Ddl_Table::TYPE_TEXT,
                  'nullable'    => false,
                  'length'      => 255,
                  'comment'     => 'Product name'
              ]
          );
$installer->getConnection()
          ->addColumn(
              $installer->getTable('sp_featuredproducts/featured'),
              'price',
              [
                  'type'        => Varien_Db_Ddl_Table::TYPE_DECIMAL,
                  'nullable'    => false,
                  'length'       => '12,4',
                  'comment'     => 'Product price'
              ]
          );
$installer->getConnection()
          ->addColumn(
              $installer->getTable('sp_featuredproducts/featured'),
              'sku',
              [
                  'type'        => Varien_Db_Ddl_Table::TYPE_TEXT,
                  'nullable'    => false,
                  'length'      => 64,
                  'comment'     => 'Product SKU'
              ]
          );

$installer->endSetup();