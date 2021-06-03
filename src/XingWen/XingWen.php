<?php

namespace XingWen;

/**
 * Class XingWen
 * @package XingWen
 * @method  apply(string $bankNumber, string $carNumber, string $cusNo, string $idCard, string $idCardAddress, string $name, string $phone, string $regionCode = '60000')
 * @method  fileNotify(string $batchNo, string $fileName, string $fileType)
 * @method  repayNotify(string $amount, string $cusNo, string $finishTime)
 */
class XingWen
{
    /**
     * @var Option $option
     */
    protected $option;

    /**
     * @var Url $url
     */
    protected $url;

    /**
     * XingWen constructor.
     */
    public function __construct($option = '')
    {
        $this->option = $this->createOptions($option ?: array());
        $this->url = $this->option->getUrlSet();
    }

    protected function createOptions($option): Option
    {
        if (is_array($option)) {
            return new Option($option);
        }
        if ($option instanceof Option) {
            return $option;
        }
        throw new \InvalidArgumentException('Invalid type for client options');
    }

    public function request($method, $argus)
    {
        if (!method_exists(Routes::class, $method)) {
            throw new \BadMethodCallException("$method is not found");
        }
        return (new Routes($this->option, $this->url))->$method(...$argus);
    }

    public function __call($method, $arguments)
    {
        return $this->request($method, $arguments);
    }
}