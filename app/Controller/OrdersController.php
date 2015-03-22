<?php
/**
 * Created by PhpStorm.
 * User: YoheiSugiyama
 * Date: 15/02/12
 * Time: 21:45
 */

class OrdersController extends AppController
{

    public $uses = array('Order', 'Book');

    public $helpers = array('Html', 'Form');

    public function index()
    {

        if ($this->request->is('post')) {

            //ヘッダー作成用に、データベースから予めユーザー情報を取得しておく。
            $data = $this->Auth->user();
            $this->set('data', $data);


            $id = $this->request->data['Order']['id'];
            $quantity = $this->request->data['Order']['quantity'];

            $user = $this->Auth->user('username');

            $orderdata = array(
                'user' => $user,
                'id' => $id,
                'quantity' => $quantity
            );


            $this->Order->create();

            if ($this->Order->save($orderdata)) {

                $this->Session->setFlash(__('書籍がショッピングカートに追加されました.'));

                $orders=$this->Order->find('all');

                $total=0;

                $this->set(array('orders'=>$orders,
                    'total'=> $total));


            } else {

                $this->Session->setFlash(__('書籍をショッピングカートに追加できませんでした'));
            }

        }else{

            $data = $this->Auth->user();
            $this->set('data', $data);

            $orders=$this->Order->find('all');
            $total=0;
            $this->set(array('orders'=>$orders,
                'total'=> $total));
        }

    }

    public function clear_order()
    {

     //cakephpのdeleteAllは、以下のように'1=1'等のダミーデータを入れないと削除できないようになっている！
        $this->Order->deleteAll(array('1=1', false));

        $data = $this->Auth->user();
        $this->set('data', $data);

        $orders=$this->Order->find('all');
        $total=0;
        $this->set(array('orders'=>$orders,
            'total'=> $total));

        $this->render('index');

    }



}