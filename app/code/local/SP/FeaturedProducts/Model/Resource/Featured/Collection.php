<?php

/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */
class SP_FeaturedProducts_Model_Resource_Featured_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * {@inheritdoc}
     */
    public function _construct()
    {
        $this->_init("sp_featuredproducts/featured");
    }
}