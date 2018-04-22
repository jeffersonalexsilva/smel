<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Perfi'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="perfis index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('idperfil') ?></th>
            <th><?= $this->Paginator->sort('descricao') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($perfis as $perfi): ?>
        <tr>
            <td><?= $this->Number->format($perfi->idperfil) ?></td>
            <td><?= h($perfi->descricao) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $perfi->idperfil]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $perfi->idperfil]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $perfi->idperfil], ['confirm' => __('Are you sure you want to delete # {0}?', $perfi->idperfil)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
