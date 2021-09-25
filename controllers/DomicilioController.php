<?php

namespace app\controllers;

use app\models\CatCp;
use app\models\Usuario;
use yii\web\Controller;
use app\models\Domicilio;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\DomicilioSearch;
use yii\web\NotFoundHttpException;

/**
 * DomicilioController implements the CRUD actions for Domicilio model.
 */
class DomicilioController extends Controller
{
    /**
     * @inheritDoc
     */
      public function behaviors()
{
	return [
		'ghost-access'=> [
			'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
		],
	];
}

    /**
     * Lists all Domicilio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DomicilioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Domicilio model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Domicilio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Domicilio();
        
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->dom_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

       $usuarios = Usuario::map();
      // $codigos= CatCp::map();

      /*  echo '<pre>';
        var_dump($usuarios);
        echo '</pre>';
        die;
*/

        return $this->render('create', [
            'model' => $model,
            'usuarios' => $usuarios,
          //  'codigos' => $codigos
        ]);
    }

    /**
     * Updates an existing Domicilio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->dom_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Domicilio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Domicilio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Domicilio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Domicilio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
