<?php

namespace XingWen;

class Url
{
    protected $apply = 'http://new_xingwen.cd-zq.com/open/api/open/Loan58/apply';

    protected $fileNotify = 'http://new_xingwen.cd-zq.com/open/api/open/Loan58/fileNotify';

    protected $repayNotify = 'http://new_xingwen.cd-zq.com/open/api/open/Loan58/repayNotify';

    public function __construct($url)
    {
        $this->setApply($url['apply'] ?? $this->apply);
        $this->setFileNotify($url['fileNotify'] ?? $this->fileNotify);
        $this->setRepayNotify($url['repayNotify'] ?? $this->repayNotify);
    }

    /**
     * @return string
     */
    public function getApply(): string
    {
        return $this->apply;
    }

    /**
     * @param mixed|string $apply
     */
    public function setApply($apply): void
    {
        $this->apply = $apply;
    }

    /**
     * @return string
     */
    public function getFileNotify(): string
    {
        return $this->fileNotify;
    }

    /**
     * @param mixed|string $fileNotify
     */
    public function setFileNotify($fileNotify): void
    {
        $this->fileNotify = $fileNotify;
    }

    /**
     * @return string
     */
    public function getRepayNotify(): string
    {
        return $this->repayNotify;
    }

    /**
     * @param mixed|string $repayNotify
     */
    public function setRepayNotify($repayNotify): void
    {
        $this->repayNotify = $repayNotify;
    }


}
