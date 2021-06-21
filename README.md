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
        ]
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

```





