<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Questionnaire> $questionnaires
 */
?>
<div class="questionnaires index content">
    <h3><?= __('Questionnaires') ?></h3>
    <p>(You can add Quesionnaire through Projects page.)</p>

    <!-- The search query -->
    <?= $this->Form->create(null, [
        'type' => 'get',
        'value' => $this->request->getQuery('question_data')
    ])
    ?>
    <?= $this->Form->control("question_data", [
        'label' => "Search Questionnaire by Business Name:",
        'class' => "search-field",
    ]) ?>
    <?= $this->Form->control("from_date", [
            'label' => "Completion Date:",
            'type' => "dateTime",
        ]
    ) ?>
    <?= $this->Form->button(__('Search')) ?>
    <?= $this->Form->end() ?>

    <!-- The body -->
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('project_id') ?></th>
                <th><?= $this->Paginator->sort('business_name') ?></th>
                <th><?= $this->Paginator->sort('website') ?></th>
                <th><?= $this->Paginator->sort('completion_time') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($questionnaires as $questionnaire): ?>
                <tr>
                    <td><?= $questionnaire->hasValue('project') ? $this->Html->link($questionnaire->project->full_name, ['controller' => 'Projects', 'action' => 'view', $questionnaire->project->id]) : '' ?></td>
                    <td><?= h($questionnaire->business_name) ?></td>
                    <td><?= h($questionnaire->website) ?></td>
                    <td><?= h($questionnaire->completion_time->format('jS F Y, h:i a')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $questionnaire->id]) ?><br>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $questionnaire->id]) ?><br>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionnaire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionnaire->id)]) ?>
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
