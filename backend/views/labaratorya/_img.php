<?php
use zxbodya\yii2\galleryManager\GalleryManager;

/* @var $this yii\web\View */
/* @var $model Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Labaratoriya Rasimlari'), 'url' => ['labaratorya/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
...
<div style="background: #fff; padding: 20px;">
    <?php
    if ($model->isNewRecord) {
        echo 'Can not upload images for new record';
    } else {
        echo GalleryManager::widget(
            [
                'model' => $model,
                'behaviorName' => 'galleryBehavior',
                'apiRoute' => 'labaratorya/galleryApi'
            ]
        );
    }
    ?>
</div>