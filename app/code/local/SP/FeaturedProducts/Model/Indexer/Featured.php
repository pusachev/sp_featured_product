<?php

/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

class SP_FeaturedProducts_Model_Indexer_Featured
    extends Mage_Index_Model_Indexer_Abstract
{
    protected $_matchedEntities = [
        Mage_Catalog_Model_Product::ENTITY => [
            Mage_Index_Model_Event::TYPE_SAVE,
            Mage_Index_Model_Event::TYPE_MASS_ACTION
        ]
    ];

    protected function _construct()
    {
        $this->_init('sp_featuredproducts/indexer_featured');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return Mage::helper('sp_featuredproducts')->__('Featured Product');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return Mage::helper('sp_featuredproducts')->__('Indexes featured products');
    }

    /**
     * @param Mage_Index_Model_Event $event
     */
    protected function _registerEvent(Mage_Index_Model_Event $event)
    {
        /** @var Mage_Catalog_Model_Product $entity */
        $entity = $event->getDataObject();

        if ($entity->dataHasChangedFor('is_featured')) {
            $event->setData('product_id', $entity->getId());
        } elseif ($entity->getAttributesData()) {
            $attributesData = $entity->getAttributesData();
            if (isset($attributesData['is_featured'])) {
                $event->setData('product_ids', $entity->getProductIds());
            }
        }
    }

    /**
     * @param Mage_Index_Model_Event $event
     */
    protected function _processEvent(Mage_Index_Model_Event $event)
    {
        if ($event->getData('product_id') || $event->getData('product_ids')) {
            $this->callEventHandler($event);
        }
    }
}
