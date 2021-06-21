<?php
require "vendor/autoload.php";

$xingwenTT = new \XingWen\XingWen(
    [
        'appId' => 'a77a7d4a224b468fad7ab215a12efcaa',
        'productName' => 'insure58',
        'regionCode' => '610000',
        'privateKey' => "MIICeAIBADANBgkqhkiG9w0BAQEFAASCAmIwggJeAgEAAoGBAIaj+Z2GeiEh0oT7efL2xYhESK9C
9Tjv/p6CK6k/7KvfEaRHjZ4EA7P5ZEENaaRKK5i3g9+0sanUQQkp2ZYer2Fh571JsPyQaBn8c5S3
V7Pu00lAzmrvL+ExeLPBb+6460FRiEai+Bpt2y/BGfeJ/VXcISEzGH1FMTsVfbFS7Y1DAgMBAAEC
gYAgPfgyntd0Q7M0ITyM0EdxYFi/j5tFrUMeFjH6b9JvPhXtby0cn/17BcfaRCn+K7zQ73FnCtBY
yPliBmGSr3pz0KEey6bkbCWWwrNXl/Qoakw0gz3o7xJWm8Z3p8V2ZfJ6czaO7IwFv7bn1T/4/lUD
zqoUwCona0RTy6ook1HQMQJBALnKxwsHB4ermmkGbMLtomvbszSxP4eIim2QGvpuK3QAZ8ExdSO0
irj3cTqAvasb6Cws8Ciu54G0t0EcVKlxns0CQQC5hODlaO+7atvEMo8GdZx7a78pmV2x6uiG8xQP
L3dUkASynEXAM+Wkb72szejkn0wnt9jJ9yWlBQ+4njv7O7xPAkEAm4D6ieNPTSG3MrJ688g8CrSv
UKoON110J3HW8salPglczhmcJs9k0J3iuomotn+8GsVeGV8TS7+7JhcVUWFU/QJBAJT0R85qrvGA
Huws3AGHtRizrk0sQrpzrjeMPHLk3Z8b82mlZ6um/59DyLtSqMfHz1Gkn3+p3KPeqHzHL8nMcKkC
QQC37YbllFsKUEUAb8H3kdqN69ho+A+HCX3fdsbIU3ON3r26rmtprczTXhEfUnQPrkUw7t4pTR3/
5y0sgrncIkJ9",
        'publicKey' => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCGo/mdhnohIdKE+3ny9sWIREivQvU47/6egiup P+yr3xGkR42eBAOz+WRBDWmkSiuYt4PftLGp1EEJKdmWHq9hYee9SbD8kGgZ/HOUt1ez7tNJQM5q 7y/hMXizwW/uuOtBUYhGovgabdsvwRn3if1V3CEhMxh9RTE7FX2xUu2NQwIDAQAB',
        'url' =>[
            'apply' => 'http://new_xingwen.cd-zq.com/open/api/open/Loan58/apply',
            'fileNotify' => 'http://new_xingwen.cd-zq.com/open/api/open/Loan58/fileNotify',
            'repayNotify' => 'http://new_xingwen.cd-zq.com/open/api/open/Loan58/repayNotify'
        ]
    ]
);

$class1 = $xingwenTT;
$Test1 = $class1->apply('100021','6222024402011619040', '川A06P8C', '513902199111253656', '513902199111253656', '成都市高新区天府大道', '林狠', '04cc99a3c6693ad2166f017ba8965caced68b851','14774208429');

var_dump($Test1->isSuccess().$Test1->getError());exit;



//sleep(10);