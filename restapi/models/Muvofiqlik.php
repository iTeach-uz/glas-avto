<?php

namespace restapi\models;

use common\models\Muvofiq;

class Muvofiqlik extends Muvofiq{

    public function fields(){
        return [
            'id',
            'title',
            'text',
            'items' => function(Muvofiq $model){
                return $model->uploadfile;
            }
        ];
    }

}