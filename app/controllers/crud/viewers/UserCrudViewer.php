<?php
namespace controllers\crud\viewers;

use Ubiquity\controllers\crud\viewers\ModelViewer;
 /**
 * Class UserCrudViewer
 **/
class UserCrudViewer extends ModelViewer{

    public function getDataTableRowButtons()
    {
        return ['delete','display'];
    }
}
