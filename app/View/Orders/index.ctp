<?php echo $this->element('header',array('header'=>$data))?>

<hr>

<h1>カート一覧</h1>

<?php echo $this->Form->create('Book', array('action'=>'show_books')) ?>

<table class="booklist">
    <tr>
        <td>BookID</td>
        <td>タイトル</td>
        <td>冊数</td>
        <td>価格</td>
        <td>小計</td>

    </tr>

    <?php foreach($orders as $row): ?>
    <tr>
        <td><?php echo h($row['Order']['id']); ?></td>
        <td><?php echo h($row['Category']['title']);?></td>
        <td><?php echo h($row['Order']['quantity']);?></td>
        <td><?php echo h($row['Category']['price']); ?></td>
        <td><?php echo h($row['Order']['quantity']*$row['Category']['price']); ?></td>
    </tr>

    <?php
        $total += $row['Order']['quantity']*$row['Category']['price'];
        endforeach;
    ?>


    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo h($total); ?></td>
    </tr>
</table>

<?php echo $this->Form->end('戻る') ?>

<?php echo $this->Form->create('Order', array('action'=>'clear_order')) ?>
<?php echo $this->Form->end('オーダーをクリアする') ?>





