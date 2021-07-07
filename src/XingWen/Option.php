<?php

namespace XingWen;

class Option
{
    protected $appId;

    protected $privateKey;

    protected $productName;

    protected $baseUrl;

    protected $regionCode;

    protected $sftpHost;

    protected $account;

    protected $password;

    protected $port;

    protected $root;

    protected $timeout;

    protected $directoryPerm;

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
        $this->sftpHost = $option['sftp'] ?? '';
        $this->account = $option['account'] ?? '';
        $this->password = $option['password'] ?? '';
        $this->port = $option['port'] ?? '22';

        $this->root = $option['root'] ?? './';
        $this->timeout = $option['timeout'] ?? '10';
        $this->directoryPerm = $option['directoryPerm'] = 0755;

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

    /**
     * @return mixed|string
     */
    public function getSftpHost()
    {
        return $this->sftpHost;
    }

    /**
     * @return mixed|string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed|string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return mixed|string
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * @return mixed|string
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @return int
     */
    public function getDirectoryPerm(): int
    {
        return $this->directoryPerm;
    }


}
