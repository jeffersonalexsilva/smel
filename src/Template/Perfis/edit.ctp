<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $perfi->idperfil],
                ['confirm' => __('Are you sure you want to delete # {0}?', $perfi->idperfil)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Perfis'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="perfis form large-10 medium-9 columns">
    <?= $this->Form->create($perfi) ?>
    <fieldset>
        <legend><?= __('Edit Perfi') ?></legend>
        <?php
            echo $this->Form->input('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
