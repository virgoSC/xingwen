<?php

namespace XingWen;

class Option
{
    protected $appId;

    protected $privateKey;

    protected $productName = 'insure58';

    /**
     * @var Url $urlSet
     */
    protected $urlSet;

    public function __construct(array $option)
    {
        $this->appId = $option['appId'];
        $this->privateKey = $option['privateKey'];
        $this->productName = $option['productName'] ?? $this->productName;
        $this->createUrl($option['url'] ?: array());
    }


    private function createUrl(array $url)
    {
        $this->urlSet = new Url($url);
    }

    public function getUrlSet(): Url
    {
        return $this->urlSet;
    }
}
