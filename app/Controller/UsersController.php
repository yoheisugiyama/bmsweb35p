<?php
/**
 * Created by PhpStorm.
 * User: YSugiyamaMac
 * Date: 14/12/28
 * Time: 11:32
 */

class UsersController extends AppController
{

    public function beforeFilter()
    {
        parent::beforeFilter();
        // ユーザー自身による登録とログアウトを許可する
        $this->Auth->allow('add', 'logout');
    }

    public function login()
    {

        //Auth認証（ログイン）
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('ログイン成功!'));
                $this->redirect($this->Auth->redirect());

            } else {
                $this->Session->setFlash(__('ユーザー名とパスワードが正しくありません。もう一度試して下さい。'));
            }
        }
    }

    public function logout()
    {
        //Auth認証（ログアウト）
        $this->redirect($this->Auth->logout());
    }


    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }


    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {

            $this->User->validate=array(
                'username'=>array(
                    array(
                        'rule' => array('notEmpty'),
                        'message' => 'ユーザー名の入力が必要です'
                        ),

                    array(
                        'rule'=>'isUnique',
                        'message'=>'ユーザー名がすでに使用されております。'
                    ),
                ),

                'password' => array(
                        'rule' => array('notEmpty'),
                        'message' => 'パスワードの入力が必要です'
                ),
            );

            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('ユーザー名・パスワードが保存されました'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {

        $this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }


    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }


}

