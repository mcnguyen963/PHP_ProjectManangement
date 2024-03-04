<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Client> $clients
 */
?>
<div class="clients index content">
    <?= $this->Html->link(__('New Client'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Clients') ?></h3>

    <!-- The search query -->
    <?= $this->Form->create(null,[
        'type'=>'get',
        'value'=>$this->request->getQuery('firstName_data')
    ])
    ?>
    <?= $this->Form->control("firstName_data",[
            'label'=>"Search Client by first name:",
            'class'=>"search-field",
        ]
    )?>
    <?= $this->Form->create(null,[
        'type'=>'get',
        'value'=>$this->request->getQuery('surname_data')
    ])
    ?>
    <?= $this->Form->control("surname_data",[
            'label'=>"Surname:",
            'class'=>"search-field",
        ]
    )?>
    <?= $this->Form->create(null,[
        'type'=>'get',
        'value'=>$this->request->getQuery('address_data')
    ])
    ?>
    <?= $this->Form->control("address_data",[
            'label'=>"Address:",
            'class'=>"search-field",
        ]
    )?>

    <?= $this->Form->button(__('Search')) ?>
    <?=$this->Form->end()?>

    <!-- The body -->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('surname') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= h($client->first_name) ?></td>
                    <td><?= h($client->surname) ?></td>
                    <td><?= $this->Html->link(h($client->email),'mailto:'.$client->email) ?></td>
                    <td><?= h($client->phone_number) ?></td>
                    <td><?= h($client->address) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $client->id]) ?><br>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $client->id]) ?><br>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
