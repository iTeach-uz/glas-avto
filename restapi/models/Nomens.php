<?php

namespace restapi\models;

use common\models\Nomen;
use restapi\models\Url;

class Nomens extends Nomen{

    public function fields(){
        return [
            'id',
            'title',
            'model',
            'number',
            'img' => function(Nomen $model){
                return $model->getImageUrl();
            },
        ];
    }

}