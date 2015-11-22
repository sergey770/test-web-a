<?


namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Categories;
use common\models\IncoExpenso;

class CategoriesController extends Controller
{
    public function actionIndex()
    {
        //$categ = new Categories;
        $sql = 'select * from categories cat, inco_expenso ie where cat.inc_exp_id = ie.inc_exp_id order by categ_active_to';
        //$query = $categ->findBySql($sql)->all();
        $query = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('index',['query' => $query]);
    }
    
    public function actionCreate()
    {
        $categ = new Categories;
        $inco_ex = new IncoExpenso;
        
        $inco_ex = $inco_ex->find()->all();
        
        if($categ->load(Yii::$app->request->post()) && $categ->validate())
        {
            //return print_r($_POST);
            $categ['categ_active_from'] = date("Y-m-d");
            
            $categ->save();
            return $this->redirect('index');
        }
        return $this->render('create',['categ' => $categ, 'inco_ex' => $inco_ex]);
    }
    
    
    
    
    public function actionUpdate($id)
    {
        $id = (int)$id;
        if (empty($id))
        {
            return $this->redirect('index');
        }
        
        $categ = new Categories;
        $inco_ex = new IncoExpenso;
        $inco_ex = $inco_ex->find()->all();
        
        $sql = $this->sql_activ_delete($id);
        
        //проверяем активна запись для изменения
        
        $query = Categories::findBySql($sql)->count();
        if ($query == 0)
        {
            return $this->redirect('index');
        }
        $sql = $categ->findOne($id);
        
        if($categ->load(Yii::$app->request->post()) && $sql->validate())
        {
            //return print_r($_POST);
            $sql->updateAll(['categ_name' => $_POST['Categories']['categ_name'],'inc_exp_id' => $_POST['Categories']['inc_exp_id']],['categ_id'=>$id]);

            return $this->redirect('index');
        }
        
        return $this->render('update',['categ' => $sql, 'inco_ex' => $inco_ex]);
    }
    
    
    
    
    
    public function actionDelete($id)
    {
        $id = (int)$id;
        if (empty($id))
        {
            return $this->redirect('index');
        }
        $categ = new Categories;
        $categ->updateAll(['categ_active_to' => date("Y-m-d")],['categ_id'=>$id]);
        
        return $this->redirect('index');
    }
    
    public function actionActive($id)
    {
        // проверяем число
        $id = (int)$id;
        if (empty($id))
        {
            return $this->redirect('index');
        }
        
        $categ = new Categories;
        $categ->updateAll(['categ_active_to' => null],['categ_id'=>$id]);
        
        return $this->redirect('index');
    }
    
    
    private function sql_activ_delete($id)
    {
        $sql = 'select categ_active_to from categories where categ_active_to is null and categ_id = '.$id;
        return $sql;
    }
}