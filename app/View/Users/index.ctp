
<h1>Users</h1>
<table>
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Edit</th>
    </tr>

    <?php foreach ($users as $row): ?>
        <tr>
            <td><?php echo $row['User']['username']; ?></td>
            <td><?php echo $row['User']['password']; ?></td>
            <td>
                <?php echo $this->Html->link('Edit', array('action' => 'edit', $row['User']['username'])); ?>
            </td>
            <td>

            </td>
        </tr>
    <?php endforeach; ?>
</table>

    <?php
      echo $this->Form->create('Book', array('controller'=>'books','action'=>'index'));
      echo $this->Form->end('戻る');
    ?>

<?php unset($row); ?>