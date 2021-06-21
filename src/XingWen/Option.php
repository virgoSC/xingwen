<?php

namespace XingWen;

class Option
{
    protected $appId;

    protected $privateKey;

    protected $productName;

    protected $baseUrl;

    protected $regionCode;

    /**
     * @var Url $urlSet
     */
    protected $urlSet;

    public function __construct(array $option)
    {
        $this->appId = $option['appId'] ?? '';
        $this->privateKey = $option['privateKey'] ?? '';
        $this->productName = $option['productName'] ?? '';
        $this->baseUrl = $option['baseUrl'] ?? '';
        $this->regionCode = $option['regionCode'] ?? '';
        $this->configUrl($option['url'] ?: array());
    }

    /**
     * @return mixed|string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @return mixed|string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @return mixed|string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @return mixed|string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @return mixed|string
     */
    public function getRegionCode()
    {
        return $this->regionCode;
    }

    private function configUrl(array $url)
    {
        $this->urlSet = new Url($url);
    }

    public function getUrlSet(): Url
    {
        return $this->urlSet;
    }
}
