<?php
require "vendor/autoload.php";

class ioc
{
    public static $instance = [];

    public static $self;


    public static function construct(): ioc
    {
        if (self::$self instanceof self) {
            return self::$self;
        } else {
            self::$self = new self();
        }
        return self::$self;
    }

    public static function insert($object)
    {
        if (!key_exists(get_class($object), self::$instance)) {
            self::$instance[get_class($object)] = $object;
        }
        return self::$instance[get_class($object)];
    }

    public static function get( string $className)
    {
        return self::$instance[$className];
    }
}

$ioc = ioc::construct();


$xingwenTT = new \XingWen\XingWen(
    [
        'appId' => 'a77a7d4a224b468fad7ab215a12efcaa',
        'privateKey' => "-----BEGIN RSA PRIVATE KEY-----\n
            MIICeAIBADANBgkqhkiG9w0BAQEFAASCAmIwggJeAgEAAoGBAIaj+Z2GeiEh0oT7efL2xYhESK9C\n" .
            "9Tjv/p6CK6k/7KvfEaRHjZ4EA7P5ZEENaaRKK5i3g9+0sanUQQkp2ZYer2Fh571JsPyQaBn8c5S3\n" .
            "V7Pu00lAzmrvL+ExeLPBb+6460FRiEai+Bpt2y/BGfeJ/VXcISEzGH1FMTsVfbFS7Y1DAgMBAAEC\n" .
            "gYAgPfgyntd0Q7M0ITyM0EdxYFi/j5tFrUMeFjH6b9JvPhXtby0cn/17BcfaRCn+K7zQ73FnCtBY\n" .
            "yPliBmGSr3pz0KEey6bkbCWWwrNXl/Qoakw0gz3o7xJWm8Z3p8V2ZfJ6czaO7IwFv7bn1T/4/lUD\n" .
            "zqoUwCona0RTy6ook1HQMQJBALnKxwsHB4ermmkGbMLtomvbszSxP4eIim2QGvpuK3QAZ8ExdSO0\n" .
            "irj3cTqAvasb6Cws8Ciu54G0t0EcVKlxns0CQQC5hODlaO+7atvEMo8GdZx7a78pmV2x6uiG8xQP\n" .
            "L3dUkASynEXAM+Wkb72szejkn0wnt9jJ9yWlBQ+4njv7O7xPAkEAm4D6ieNPTSG3MrJ688g8CrSv\n" .
            "UKoON110J3HW8salPglczhmcJs9k0J3iuomotn+8GsVeGV8TS7+7JhcVUWFU/QJBAJT0R85qrvGA\n" .
            "Huws3AGHtRizrk0sQrpzrjeMPHLk3Z8b82mlZ6um/59DyLtSqMfHz1Gkn3+p3KPeqHzHL8nMcKkC\n" .
            "QQC37YbllFsKUEUAb8H3kdqN69ho+A+HCX3fdsbIU3ON3r26rmtprczTXhEfUnQPrkUw7t4pTR3/\n" .
            "5y0sgrncIkJ9\n
            -----END RSA PRIVATE KEY-----"
    ]
);
$ioc::insert($xingwenTT);

$class1 = $ioc::get(get_class($xingwenTT));
$Test1 = $class1->apply('32323', '33333', 'ddddd', 'dafdaf', 'ddddfa', 'ada', 'iekdfafa');





$class2 = $ioc::get(get_class($xingwenTT));
$Test2 = $class2->apply('5454', '33333', 'ddddd', 'dafdaf', 'ddddfa', 'ada', 'iekdfafa');

var_dump($class1 === $class2);
var_dump($Test1 === $Test2);

//sleep(10);