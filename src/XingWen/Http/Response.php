<?php

namespace XingWen\Http;

class Response
{
    private $code = '200';

    private $body = '';

    /**
     * @var array $header
     */
    private $header = [];

    private $error;


    public function resolve()
    {
        if ($this->code !== '200') {
            $this->error = $this->body;
        } else {
            if (json_decode($this->body)) {
                $this->body = json_decode($this->body, true);

                if (($code = $this->body['code'] ?? false) and $code != '200') {
                    $this->setError($this->body['msg'] ?? false);
                    return $this;
                }

                $status = $this->body['data']['status'] ?? '';
                $this->caseStatus($status);
            }

        }
        return $this;
    }

    private function caseStatus($status)
    {
        switch ($status) {
            case '0':
                return;
            case '-1':
                $this->setError('放款异常');
                return;
            case '-2':
                $this->setError('超时');
                return;
            default:
                $this->setError('请求失败');
        }
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Response
     */
    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return Response
     */
    public function setBody(string $body): self
    {
        $this->body = $body;
        return $this;

    }

    /**
     * @return string
     */
    public function getHeader(): string
    {
        return $this->header;
    }

    /**
     * @param array $header
     * @return Response
     */
    public function setHeader(array $header): self
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     */
    public function setError($error): self
    {
        $this->error = $error;
        $this->code = '500';
        return $this;
    }


    public function isSuccess() :bool
    {
        return $this->code == '200';
    }

}