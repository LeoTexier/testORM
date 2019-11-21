<?php
namespace controllers\crud\datas;

use Ubiquity\controllers\crud\CRUDDatas;
 /**
 * Class UserCrudDatas
 **/
class UserCrudDatas extends CRUDDatas{


    public function getFieldNames($model)
    {
        return ['firstName','lastName','email'];
    }
}
