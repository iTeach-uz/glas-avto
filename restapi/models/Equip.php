<?php

namespace restapi\models;

use common\models\Equipment;

class Equip extends Equipment{

    public function fields(){

        return [
            'id',
            'title',
            'text',
            'imgs' => function(Equipment $model){
                return $model->images();
            }
        ];

    }

}