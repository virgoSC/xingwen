<?php

namespace XingWen;

use Exception;
use League\Flysystem\Filesystem;
use League\Flysystem\Sftp\SftpAdapter;

class Sftp
{

    private $host;

    private $account;

    private $password;

    private $port;

    private $root;

    private $timeout;

    private $directoryPerm;

    private $connection;

    private $sftp;

    /**
     * @throws Exception
     */
    public function __construct(Option $option)
    {
        $this->host = $option->getSftpHost();

        $this->account = $option->getAccount();

        $this->password = $option->getPassword();

        $this->port = $option->getPort();

        $this->root = $option->getRoot();
        $this->timeout = $option->getTimeout();
        $this->directoryPerm = $option->getDirectoryPerm();

        if (!$this->host) {
            throw new Exception('sftp host not null');
        }
        if (!$this->password or !$this->account) {
            throw new Exception('sftp config error');
        }

        $this->connection =new Filesystem(new SftpAdapter([
            'host' => $this->host,
            'port' => $this->port,
            'username' => $this->account,
            'password' => $this->password,
            'privateKey' => '',
            'passphrase' => '',
            'root' => $this->root,
            'timeout' => $this->timeout,
            'directoryPerm' => $this->directoryPerm
        ]));
    }

    //上传文件
    public function uploadFile(string $fileName, string $file): bool
    {
        return $this->connection->put($fileName, fopen($file,'r'));
    }
}