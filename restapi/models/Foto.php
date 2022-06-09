<?php

namespace restapi\models;

use common\models\Fotogalareya;
use restapi\models\Url;

class Foto extends Fotogalareya{

    public function fields(){

        return [
            'id',
            'img' => function(Fotogalareya $model){
                return $model->getImageUrl();
            } 
        ];

    }

}