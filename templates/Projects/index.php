<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Project> $projects
 * @var Cake\Utility\Security::encrypt
 */
    $statuses=[
        'Shortlisted'=>'Shortlisted',
        'Excommunicado'=>'Excommunicado',
        'Excommunicado'=>'Excommunicado',
        'Too complex'=>'Too complex',
        'Confirmed'=>'Confirmed',
        'No response'=>'No response',
        'Postponed to future'=>'Postponed to future',
    ];
    $necessities=[
        'low'=>'Low',
        'medium'=>'Medium',
        'high'=>'High',
    ];
    $attend=[
        '1'=>'True',
        '0'=>'False',
    ];
?>
<div class="projects index content">
    <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Projects') ?></h3>

    <!-- The search query -->
    <?= $this->Form->create(null,[
        'type'=>'get',
        'value'=>$this->request->getQuery('semCode')
    ])
    ?>
    <?= $this->Form->control("semCode",[
            'label'=>"Search project by Semester Code:",
            'class'=>"search-field",
        ]
    )?>
    <div style="font-weight: bold">Status:</div>
    <?= $this->Form->select("status",$statuses,['empty'=>true])?>
    <div style="font-weight: bold">Level Of Necessity:</div>
    <?= $this->Form->select("necessity",$necessities,['empty'=>true])?>
    <div style="font-weight: bold">Attend Meet And Greet:</div>
    <?= $this->Form->select("isAttend",$attend,['empty'=>true])?>

    <?= $this->Form->button(__('Search')) ?>
    <?=$this->Form->end()?>

    <!-- The body -->
    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('client_id') ?></th>
                <th><?= $this->Paginator->sort('semester') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('last_contact') ?></th>
                <th><?= $this->Paginator->sort('level_of_necessity') ?></th>
                <th><?= $this->Paginator->sort('attend_meet_and_greet') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $project->hasValue('client') ? $this->Html->link($project->client->first_name . " " . $project->client->surname, ['controller' => 'Clients', 'action' => 'view', $project->client->id]) : '' ?></td>
                    <td><?= h($project->semester) ?></td>
                    <td><?= h($project->status) ?></td>
                    <td><?= h($project->last_contact->format('jS F Y, h:i a')) ?></td>
                    <td><?= h($project->level_of_necessity) ?></td>
                    <td>
                        <?php
                        if ($project->attend_meet_and_greet == 1) {
                            echo("Yes");
                        } else {
                            echo("No");
                        }
                        ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $project->id]) ?><br>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id]) ?><br>
                        <?php
                           if (empty($project->questionnaires)){
                                echo($this->Html->link(__('Get Link'), ['controller'=>'questionnaires','action' => 'add',Cake\Utility\Security::encrypt($project->id, 'wt1U5MACWJFTXGenFoZoiLwQGrLgdbHA')]) );
                            }
                        ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
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
