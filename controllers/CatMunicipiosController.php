<?php

namespace app\controllers;

use app\models\CatMunicipios;
use app\models\CatMunicipiosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatMunicipiosController implements the CRUD actions for CatMunicipios model.
 */
class CatMunicipiosController extends Controller
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
     * Lists all CatMunicipios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatMunicipiosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatMunicipios model.
     * @param integer $idmunicipio
     * @param integer $idestado
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idmunicipio, $idestado)
    {
        return $this->render('view', [
            'model' => $this->findModel($idmunicipio, $idestado),
        ]);
    }

    /**
     * Creates a new CatMunicipios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatMunicipios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idmunicipio' => $model->idmunicipio, 'idestado' => $model->idestado]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CatMunicipios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idmunicipio
     * @param integer $idestado
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idmunicipio, $idestado)
    {
        $model = $this->findModel($idmunicipio, $idestado);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idmunicipio' => $model->idmunicipio, 'idestado' => $model->idestado]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CatMunicipios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idmunicipio
     * @param integer $idestado
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idmunicipio, $idestado)
    {
        $this->findModel($idmunicipio, $idestado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatMunicipios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idmunicipio
     * @param integer $idestado
     * @return CatMunicipios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idmunicipio, $idestado)
    {
        if (($model = CatMunicipios::findOne(['idmunicipio' => $idmunicipio, 'idestado' => $idestado])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
