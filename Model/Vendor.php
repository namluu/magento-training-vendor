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
}
