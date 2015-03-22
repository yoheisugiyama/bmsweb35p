
<!-- app/View/Users/login.ctp -->

<h1>書籍管理システム</h1>
<hr>
<h3>ログイン画面</h3>
<hr>
<br>


<fieldset>
    <?php echo $this->Form->create('User'); ?>
    <legend><?php echo __('ユーザ名とパスワードを入力して下さい'); ?></legend>
    <?php echo $this->Form->input('username',array('label'=>'ユーザー名', 'required'=>'false'));
    echo $this->Form->input('password',array('label'=>'パスワード','required'=>'false'));
    ?>
    <?php echo $this->Form->end(__('ログイン')); ?>
</fieldset>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<hr>
<p>　Copyright (C) 2014 All Rights Reserved.</p>
