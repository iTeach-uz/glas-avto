<?php

namespace restapi\models;

use common\models\Hamkorlar;
use restapi\models\Url;

class Hamkor extends Hamkorlar{

    public function fields(){

        return [
            'id',
            'imgs' => function(Hamkorlar $model){
                return $model->getImageUrl();
            },
            'url'
        ];

    }

}