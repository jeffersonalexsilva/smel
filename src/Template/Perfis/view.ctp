<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Perfi'), ['action' => 'edit', $perfi->idperfil]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Perfi'), ['action' => 'delete', $perfi->idperfil], ['confirm' => __('Are you sure you want to delete # {0}?', $perfi->idperfil)]) ?> </li>
        <li><?= $this->Html->link(__('List Perfis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Perfi'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="perfis view large-10 medium-9 columns">
    <h2><?= h($perfi->idperfil) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Descricao') ?></h6>
            <p><?= h($perfi->descricao) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Idperfil') ?></h6>
            <p><?= $this->Number->format($perfi->idperfil) ?></p>
        </div>
    </div>
</div>
