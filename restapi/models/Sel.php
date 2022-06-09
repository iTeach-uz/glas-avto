<?php

namespace restapi\models;

use common\models\Select;
use restapi\models\Url;

class Sel extends Select{

    public function fields(){
        return [
            'id',
            'title',
            'text',
            'img' => function(Select $model){
                return $model->getImageUrl();
            },
        ];
    }

}