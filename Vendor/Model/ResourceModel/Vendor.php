<?php
namespace Training\Vendor\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Vendor extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('training_vendor', 'vendor_id');
    }

    public function getAssignedProductIds($vendorId): array
    {
        if (!$vendorId) {
            return [];
        }

        $select = $this->getConnection()->select()
            ->from($this->getTable('training_vendor_product'), ['product_id'])
            ->where('vendor_id = ?', $vendorId);

        return $this->getConnection()->fetchCol($select);
    }
}
