<?php
namespace Training\VendorList\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Catalog\Model\ResourceModel\Product\Collection;

class View extends Template
{
    public function __construct(
        private CollectionFactory $productCollectionFactory,
        private Collection $productCollection,
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getLoadedProductCollection()
    {
       return $this->productCollection = $this->productCollectionFactory->create()
           ->addAttributeToSelect('*')
           ->addMinimalPrice()
           ->addFinalPrice()
           ->addTaxPercents()
           ->addUrlRewrite()
           ->addIdFilter($this->getVendor()?->getAssignedProductIds());
    }

    public function getVendor()
    {
        return $this->getData('vendor');
    }
}
