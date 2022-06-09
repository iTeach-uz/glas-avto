<?php

namespace restapi\models;

use common\models\Company;
use restapi\models\Url;

class MyCompany extends Company{

    public function fields(){
        return[
            'id',
            'img' => function(Company $model){
                return $model->getImageUrl();
            },
            'title',
            'text',
            'number1',
            'number2',
            'number3',
            'block_title1',
            'block_title2',
            'block_title3',
        ];
    }
    
}