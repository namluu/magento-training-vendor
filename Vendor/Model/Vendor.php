<?php
namespace Training\Vendor\Model;

use Magento\Framework\Model\AbstractModel;
use Training\Vendor\Model\ResourceModel\Vendor as VendorResource;

class Vendor extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(VendorResource::class);
    }

    public function getAssignedProductIds($id = null)
    {
        if (is_null($id) && $this->getId()) {
            $id = $this->getId();
        }
        return $this->getResource()->getAssignedProductIds($id);
    }
}
