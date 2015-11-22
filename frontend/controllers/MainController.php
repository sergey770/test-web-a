<?php
namespace frontend\controllers;

use Yii;
use common\models\Categories;
use common\models\Users;
use common\models\IncoExpenso;
use common\models\CoursesMoney;
use common\models\FamilyBudget;
use yii\web\Controller;



/**
 * Site controller
 */
class MainController extends Controller
{
    public function actionIndex()
    {
        $sql = $this -> sql_index();
        $query = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('index',['query'=>$query]);
    }
    
    
    public function actionCreate()
    {
        $famil_bud = new FamilyBudget;
        
        
        if($famil_bud->load(Yii::$app->request->post()) && $famil_bud->validate())
        {
            //return print_r($_POST);
            $famil_bud['fam_bud_create'] = date("Y-m-d");
            
            $famil_bud->save();
            return $this->redirect('index');
        }
        
        $users = new Users;
        $categ = new Categories;
        $inco_exp = new IncoExpenso;
        $mony = new CoursesMoney;
        
        
        $users = $users->find()->all();
        $categ = $categ->find()->all();
        $inco_exp = $inco_exp->find()->all();
        $mony = $mony->find()->all();
        
        
        return $this->render('create',[ 'users' => $users
                                        , 'categ' => $categ
                                        , 'inco_exp' => $inco_exp
                                        , 'mony' => $mony
                                        , 'famil_bud' => $famil_bud]);
    }
    
    
    
    private function sql_index()
    {
        $sql = 'select 
                        fb.fam_bud_id
                    ,   c.categ_name
                    ,   ie.inc_exp_name
                    ,   u.user_name
                    ,   fb.fam_bud_create
                    ,   cm.cour_mon_name
                    ,   fb.summa
                from 
                        categories c
                	,	courses_money cm
                	,	family_budget fb
                	,	inco_expenso ie
                	,	users u
                where fb.user_id = u.user_id
                	and fb.categ_id = c.categ_id
                	and c.inc_exp_id = ie.inc_exp_id
                	and fb.cour_mon_id = cm.cour_mon_id
                order by fb.fam_bud_create';
        return $sql;
    }
    
}
