<?php

namespace backend\controllers;

use common\models\SertifikatItem;
use common\models\SertifikatItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
/**
 * SertifikatItemController implements the CRUD actions for SertifikatItem model.
 */
class SertifikatItemController extends Controller
{
    





    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                        
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ]
        );
    }

   






    public function actionIndex()
    {
        if(!Yii::$app->user->can("Administrator")){
            throw new \yii\web\ForbiddenHttpException("Sizga ushbu sahifaga ruxsat berilmaga!");
        }
        $searchModel = new SertifikatItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    





    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    




    public function actionCreate($id)
    {
        $model = new SertifikatItem();
        $model->scenario = SertifikatItem::SCENARIO_CREATE;
        
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->category_id = $id;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    





    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SertifikatItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['sertifikat/index']);
    }

    /**
     * Finds the SertifikatItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SertifikatItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SertifikatItem::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

              
    public function actionChange($id){

        $model = $this->findModel($id);

        if($model->status == '1'){

            $model->status = '0';

            $model->save(false);

            return $this->redirect(Yii::$app->request->referrer);
        }
        elseif($model->status == '0'){

            $model->status = '1';

            $model->save(false);

            return $this->redirect(Yii::$app->request->referrer);
        }
    }
}
