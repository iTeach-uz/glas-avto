<?php

namespace restapi\models;

use common\models\Oynalar;

class Oyna extends Oynalar{

    public function fields(){

        return [
            'id',
            'title',
            'text',
            'imgs' => function(Oynalar $model){
                return $model->images();
            }
        ];

    }

}