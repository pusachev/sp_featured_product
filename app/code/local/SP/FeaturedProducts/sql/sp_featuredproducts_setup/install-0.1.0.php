<?php

/** @var Mage_Catalog_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

$installer->addAttribute('catalog_product', 'is_featured', [
    'type'          => 'int',
    'label'         => 'Is Featured',
    'input'         => 'select',
    'source'        => 'eav/entity_attribute_source_boolean',
    'user_defined'  => false,
    'required'      => false
]);


$table = $installer->getConnection()
                   ->newTable(
                       $installer->getTable('sp_featuredproducts/featured')
                   )
                   ->addColumn(
                       'product_id',
                       Varien_Db_Ddl_Table::TYPE_INTEGER,
                       11,
                       [
                           'unsigned' => true,
                           'nullable' => false,
                           'primary'  => true
                       ]
                   );

$installer->getConnection()->createTable($table);

$installer->endSetup();