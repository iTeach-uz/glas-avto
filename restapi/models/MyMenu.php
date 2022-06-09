<?php

namespace restapi\models\Menu;

use backend\modules\menumanager\models\Menu;

class MyMenu extends Menu {

    public function fields(){

        return [
            'id',
            'title',
            'url',
            'subMenus',
        ];
    }
}

?>