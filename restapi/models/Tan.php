<?php

namespace restapi\models;

use common\models\Tanlov;
use common\models\TanlovItem;
use restapi\models\Url;


class Tan extends Tanlov{

    public function fields(){

        return [
            'id',
            'title',
            'text',
            'date',
            'view_count',
            'img' => function(Tanlov $model){
                return $model->getImageUrl();
            },
            'items' => function(Tanlov $model){
                return $model->tanlovItems;
            }
        ];

    }

}