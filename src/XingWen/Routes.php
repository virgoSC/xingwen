<?php

namespace XingWen;

class Routes
{

    /**
     * @var Option $options
     */
    protected $options;

    /**
     * @var Url $urlSet
     */
    protected $urlSet;

    public function __construct(Option $option, Url $urlSet)
    {
        $this->options = $option;
        $this->urlSet = $urlSet;
    }


    public function apply(string $bankNumber, string $carNumber, string $cusNo, string $idCard, string $idCardAddress, string $name, string $phone, string $regionCode = '60000')
    {
        $param = [
            'bankNumber' => $bankNumber,
            'carNumber' => $carNumber,
            'cusNo' => $cusNo,
            'idCard' => $idCard,
            'idCardAddress' => $idCardAddress,
            'name' => $name,
            'phone' => $phone,
            'regionCode' => $regionCode
        ];

        $this->request();
    }

    public function fileNotify(string $batchNo, string $fileName, string $fileType)
    {

    }

    public function repayNotify(string $amount, string $cusNo, string $finishTime)
    {

    }

    public function request($url, $param, $method)
    {

    }

    public function buildParam(array $params): string
    {
        ksort($params);
        $signature = "";

        foreach ($params as $k => $v) {
            $signature .= $k . "=" . $v . "&";
        }

        return trim($signature, "&");
    }

    public function buildSignature(array $params)
    {
        $signature = $this->signature($params);

        return $this->getSign($signature, $this->getLoan58DefaultConfig()['private_key'] ?? null);
    }

    public function getSign($signString, $priKey)
    {
        $priKey = "-----BEGIN RSA PRIVATE KEY-----\n" . $priKey . "\n-----END RSA PRIVATE KEY-----";
        $privKeyId = openssl_pkey_get_private($priKey);

        openssl_sign($signString, $sign, $privKeyId, OPENSSL_ALGO_MD5);
        return base64_encode($sign);
    }
}
