<?php

namespace restapi\models;

use common\models\Labaratorya;

class Lab extends Labaratorya{

    public function fields(){

        return [
            'id',
            'imgs' => function(Labaratorya $model){
                return $model->images();
            },
            'title',
            'text',
        ];

    }

}