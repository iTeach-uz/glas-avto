<?php

namespace restapi\models;

use common\models\Avtomarka;


class MyAvtomarka extends Avtomarka{

        
    public function fields(){

        return [
            'id',
            'title',
            'imgs' =>  function(Avtomarka $model){
                return $model->avtomarkaItems;
            }
        ];
    }



}