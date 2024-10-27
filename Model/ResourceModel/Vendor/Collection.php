<?php
namespace Training\Vendor\Model\ResourceModel\Vendor;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Training\Vendor\Model\Vendor as VendorModel;
use Training\Vendor\Model\ResourceModel\Vendor as VendorResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(VendorModel::class,VendorResource::class);
    }

    public function setProductFilter($productId)
    {
        $this->joinLinkTable();
        if (is_object($productId)) {
            $productId = $productId->getId();
        }

        $this->getSelect()->where('link_table.product_id = ?', $productId);

        return $this;
    }

    private function joinLinkTable()
    {
        $this->getSelect()->joinLeft(
            ['link_table' => $this->getTable('training_vendor_product')],
            'main_table.vendor_id = link_table.vendor_id',
            ['product_id']
        );

        return $this;
    }
}
