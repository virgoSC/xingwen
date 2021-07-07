# xingwen

```phpregexp

$xingwenTT = new \XingWen\XingWen(
    [
        'appId' => 'appId',
        'productName' => 'test',
        'regionCode' => '100000',
        'privateKey' => "私钥",
        'publicKey' => '公钥',
        'url' =>[
            'apply' => '申请地址',
            'fileNotify' => '文件通知地址',
            'repayNotify' => '代扣地址'
        ],
        //sftp端口配置
        'port' => 22,
        'sftp' => '127.0.0.1',
        'account' => 'root',
        'password' => 'root',
        'root'=>'./',
    ]
);

$class1 = $xingwenTT;
$Test1 = $class1->apply(
    '100021',
    '6222024402011619040', 
    '川A06P8C', 
    '513902199111253656', 
    '513902199111253656', 
    '成都市高新区天府大道', 
    '林狠', 
    '04cc99a3c6693ad2166f017ba8965caced68b851',
    '14774208429');

var_dump($Test1->isSuccess().$Test1->getError());exit;


//sftp文件上传
if (0) {
    $file = 'E:\2A440704AF91C15A2AFDA2D11A527086.pdf';
    $fileName = '2A440704AF91C15A2AFDA2D11A527086.pdf';
    $response = $class1->uploadFile($fileName, $file);
    var_dump($response);
}

```





