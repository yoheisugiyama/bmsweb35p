<?php


class BooksController extends AppController{

    public $helpers = array('Html', 'Form');

    public $paginate = array(
        'limit'=>15,
        'order'=>array(
            'Book.id'=>'ASC',
        ),

    );

    public function beforeFilter(){

//  ヘッダに表示するユーザー情報をDBから取得
        $data=$this->Auth->user();
        $this->set('data',$data);
    }

    public function index() {


    }


    public function show_books(){


        $books=$this->paginate('Book',array('Book.id not'=>null));
        $this->set('books', $books);

    }


    public function add(){

        if ($this->request->is('post')) {
            $this->Book->create();
            if ($this->Book->save($this->request->data)) {
                $this->Session->setFlash(__('書籍が新たに登録されました.'));
                return $this->redirect(array('action' => 'show_books'));
            }
            $this->Session->setFlash(__('書籍を追加できませんでした'));
        }
    }

    public function delete($id=null)
    {

        if (!$id) {
            throw new NotFoundException(__('無効な動作です'));
        }

        //idはモデルでprimary keyに指定しているから、データベースアクセスしなくても、または
        //$this->request->pass[0]としなくてもそのまま変数として利用できる。

        $this->Book->delete($id);

        //データがある場合は、初期データをフォームにセット
        $this->Session->setFlash('削除しました');
        $this->redirect('/Books/show_books');

    }


    public function edit($id=null){

        //フォームが送信された場合は更新にトライ
        if($this->request->is('post')){
            $data=array(
                'id'=>$id,
                'title'=>$this->request->data['Book']['title'],
                'price'=>$this->request->data['Book']['price']
            );

            if($this->Book->save($data)){
                $this->Session->setFlash('更新しました');
                $this->redirect('/Books/show_books');
            }
        }else{
            //POSTされていない場合の処理
            //クリックしたidに該当するデータを取得
            $id=$this->request->pass[0];

            $options=array(
                'conditions'=>array(
                    'Book.id'=>$id
                )
            );

            $book=$this->Book->find('first',$options);

            //データが見つからない場合は一覧へ
            if($book==false){
                $this->Session->setFlash('タスクが見つかりません');
                $this->redirect('/Books/show_books');
            }else {
                //データがある場合は、初期データをフォームにセット
                $this->request->data = $book;

            }
        }

    }




    public function view($id=null){


        if (!$id) {
            throw new NotFoundException(__('無効な動作です'));
        }

        $book = $this->Book->find('first',array('conditions'=>array('Book.id'=>$id)));

        if (!$book) {
            throw new NotFoundException(__('無効な書籍番号です'));
        }
        $this->set('book', $book);


    }

}

