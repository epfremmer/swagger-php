<?php
namespace Epfremme\Swagger\Entity\Mixin;

use JMS\Serializer\Annotation as JMS;

/**
 * Class VendorExtensionsTrait
 * @package Epfremme\Swagger\Entity\Mixin
 */
trait VendorExtensionsTrait
{
    /**
     * @JMS\Since("2.0")
     * @JMS\Type("array")
     * @JMS\SerializedName("vendorExtensions")
     * @JMS\Accessor(getter="getVendorExtensionNull")
     * @var string[]
     */
    protected $vendorExtensions;

    /**
     * @return \string[]
     */
    public function getVendorExtensions()
    {
        return $this->vendorExtensions;
    }

    /**
     * This method exists to filter out this field when serializing
     * @return null
     */
    public function getVendorExtensionNull()
    {
        return null;
    }

    /**
     * @param \string[] $vendorExtensions
     * @return mixed
     */
    public function setVendorExtensions($vendorExtensions)
    {
        $this->vendorExtensions = $vendorExtensions;
        return $this;
    }
}