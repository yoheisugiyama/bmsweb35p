
<?php echo $this->element('header',array('header'=>$data))?>

<ul class="booklist">
    <li><?php echo $this->Html->link('書籍一覧',array('controller'=>'books', 'action'=>'show_books')); ?></li>
    <li><?php echo $this->Html->link('カート状況確認',array('controller'=>'orders', 'action'=>'index')); ?></li>
    <li><?php echo $this->Html->link('購入履歴',array('controller'=>'books', 'action'=>'register')); ?></li>
    <li><?php echo $this->Html->link('パスワード変更',array('controller'=>'books', 'action'=>'')); ?></li>
    <li><?php echo $this->Html->link('ログアウト',array('controller'=>'users', 'action'=>'logout')); ?></li>
</ul>




