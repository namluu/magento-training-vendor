<?php
namespace Training\VendorList\Block;

use Magento\Framework\View\Element\Template;
use Training\Vendor\Model\ResourceModel\Vendor\CollectionFactory;
use Training\Vendor\Model\ResourceModel\Vendor\Collection;

class Vendor extends Template
{
    public function __construct(
        private CollectionFactory $vendorCollectionFactory,
        private Collection $vendorCollection,
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getVendors()
    {
        if (is_null($this->vendorCollection)) {
            $this->vendorCollection = $this->vendorCollectionFactory->create();
        }

        if ($dir = $this->getRequest()->getParam('dir')) {
            $this->vendorCollection->setOrder('vendor_id', $dir);
        }

        return $this->vendorCollection;
    }

    public function getViewUrl($vendor)
    {
        return $this->getUrl('vendor/vendor/view', ['vendor_id' => $vendor->getId()]);
    }

    public function getSortUrl()
    {
        $dir = $this->getRequest()->getParam('dir');
        if ($dir === 'asc') {
            return $this->getUrl('vendor/vendor/index').'?dir=desc';
        }

        return $this->getUrl('vendor/vendor/index').'?dir=asc';
    }
}
