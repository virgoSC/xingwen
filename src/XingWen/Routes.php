<?php

namespace XingWen;

use Exception;
use XingWen\Http\Request;

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

    /**
     * @var Sftp $sftp
     */
    protected $sftp;

    public function __construct(Option $option, Url $urlSet)
    {
        $this->options = $option;
        $this->urlSet = $urlSet;
    }


    public function apply(string $loanAmount, string $bankNumber, string $carNumber, string $cusNo, string $idCard, string $idCardAddress, string $name, string $orderNo, string $phone, string $regionCode = '60000'): Http\Response
    {
        $param = [
            'bankNumber' => $bankNumber,
            'carNumber' => $carNumber,
            'cusNo' => $cusNo,
            'idCard' => $idCard,
            'idCardAddress' => $idCardAddress,
            'loanAmount' => $loanAmount,
            'name' => $name,
            'orderNo' => $orderNo,
            'phone' => $phone,
            'productName' => $this->options->getProductName(),
            'regionCode' => $regionCode ?? $this->options->getRegionCode()

        ];
        $param['appId'] = $this->options->getAppId();
        $sign = $this->signature($param);

        $param['signature'] = $sign;

        return $this->request($this->urlSet->getApply(), $param, 'post');
    }

    /**
     * @throws Exception
     */
    public function uploadFile(string $localFile, string $remoteFile): bool
    {
        if (!$this->sftp) {
            $this->sftpConnect();
        }

        return $this->sftp->uploadFile($localFile, $remoteFile);
    }

    public function fileNotify(string $batchNo, string $fileName, string $fileType): Http\Response
    {
        $param = [
            'batchNo' => $batchNo,
            'fileName' => $fileName,
            'fileType' => $fileType,
        ];
        $param['appId'] = $this->options->getAppId();
        $sign = $this->signature($param);

        $param['signature'] = $sign;

        return $this->request($this->urlSet->getFileNotify(), $param, 'post');
    }

    public function repayNotify(string $amount, string $cusNo, string $finishTime)
    {

    }

    private function signature(array $params): string
    {
        ksort($params);

        $signature = urldecode(http_build_query($params));

        return $this->encrypt($signature);
    }

    private function encrypt($string): string
    {
        $priKey = $this->options->getPrivateKey();

        if (!strpos('', '-----BEGIN RSA PRIVATE KEY-----')) {
            $priKey = chunk_split($priKey, 64, "\n");
            $priKey = "-----BEGIN RSA PRIVATE KEY-----\n" . $priKey . "-----END RSA PRIVATE KEY-----";
        }

        $priKeyId = openssl_pkey_get_private($priKey);

        openssl_sign($string, $sign, $priKeyId, OPENSSL_ALGO_MD5);

        return base64_encode($sign);
    }

    public function request($url, $param, $method): Http\Response
    {
        return (new Request())->request($url, $param, 'post');
    }

    /**
     * @throws Exception
     */
    private function sftpConnect()
    {
        $this->sftp = new Sftp($this->options);
    }
}
