
<?php echo $this->element('header',array('header'=>$data))?>

<hr>

<h1>書籍一覧</h1>
<?php echo $this->Html->link('書籍登録','add'); ?>
<?php echo $this->Html->link('メニュー','index'); ?>
<hr>

<br>

<table class="booklist">
    <tr>
        <th><?php echo $this->Paginator->sort('id', 'id') ?></th>
        <th><?php echo $this->Paginator->sort('title', 'タイトル') ?></th>
        <th><?php echo $this->Paginator->sort('price', '価格') ?></th>
        <th>購入数</th>
        <th></th>
    </tr>





    <?php foreach($books as $row):?>
        <?php echo $this->Form->create('Order',array('type'=>'post','action'=>'index')); ?>
        <tr>
            <td><?php echo $this->Html->link($row['Book']['id'],'view/'.$row['Book']['id']); ?>
            </td>
            <td><?php echo h($row['Book']['title']);?>
            </td>
            <td><?php echo h($row['Book']['price']);?>
            </td>
            <td>
                <?php echo $this->Form->input('Order.quantity', array('label'=>false)); ?>
            </td>
            <td>
                <?php echo $this->Form->button('カートに入れる'); ?>
                <?php echo $this->Form->hidden('id', array('value'=>$row['Book']['id'])) ?>
            </td>
        </tr>
        <?php  echo $this->Form->end(); ?>
    <?php endforeach; ?>



</table>


<?php echo $this->Paginator->counter(); ?><br/>
<?php echo $this->Paginator->prev('前へ'); ?>
<?php echo $this->Paginator->numbers(); ?>
<?php echo $this->Paginator->next('次へ'); ?>
