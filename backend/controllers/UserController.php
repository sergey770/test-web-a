<?


namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\users;

class UserController extends Controller
{
    public function actionIndex()
    {
        $user = new Users;
        $sql = 'select * from users order by user_active_to';
        $query = $user->findBySql($sql)->all();
        return $this->render('index',['query' => $query]);
    }
    
    public function actionCreate()
    {
        $user = new Users;
        
        if($user->load(Yii::$app->request->post()) && $user->validate())
        {
            $user['user_active_from'] = date("Y-m-d");
            $user->save();
            return $this->redirect('index');
        }
        return $this->render('create',['user' => $user]);
    }
    
    public function actionUpdate($id)
    {
        $id = (int)$id;
        if (empty($id))
        {
            return $this->redirect('index');
        }
        $user = new Users;
        
        $sql = $this->sql_activ_delete($id);
        
        //проверяем активна запись для изменения
        
        $query = Users::findBySql($sql)->count();
        if ($query == 0)
        {
            return $this->redirect('index');
        }
        $sql = $user->findOne($id);
        
        if($user->load(Yii::$app->request->post()) && $sql->validate())
        {
            $sql->updateAll(['user_name' => $_POST['Users']['user_name']],['user_id'=>$id]);

            return $this->redirect('index');
        }
        
        return $this->render('update',['user' => $sql]);
    }
    
    public function actionDelete($id)
    {
        $id = (int)$id;
        if (empty($id))
        {
            return $this->redirect('index');
        }
        $user = new Users;
        $user->updateAll(['user_active_to' => date("Y-m-d")],['user_id'=>$id]);
        
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
        
        $user = new Users;
        $user->updateAll(['user_active_to' => null],['user_id'=>$id]);
        
        return $this->redirect('index');
    }
    
    
    private function sql_activ_delete($id)
    {
        $sql = 'select user_active_to from users where user_active_to is null and user_id = '.$id;
        return $sql;
    }
}