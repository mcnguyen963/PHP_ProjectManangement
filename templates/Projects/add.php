<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 */
use Cake\Collection\Collection;
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects form content">
            <?= $this->Form->create($project) ?>
            <fieldset>
                <legend><?= __('Add Project') ?></legend>
                <?php
                    echo $this->Form->control('client_id', ['options' => $clients, 'label' => 'Client *']);
                    echo $this->Form->control('semester', ['label' => 'Semester * (e.g., YYYYS1 or YYYYS2)']);
                    echo $this->Form->control('status', [
                        'options' => [
                            '' => '',
                            'Confirmed' => 'Confirmed',
                            'Too complex' => 'Too complex',
                            'Postponed to future' => 'Postponed to future',
                            'Shortlisted' => 'Shortlisted',
                            'No response' => 'No response',
                            'Excommunicado' => 'Excommunicado',
                        ],
                        'label' => 'Status *'
                    ]);
                    echo $this->Form->control('last_contact', ['label' => 'Last Contact *']);
                    echo $this->Form->control('level_of_necessity', [
                        'options' => [
                            '' => '',
                            'Low' => 'Low',
                            'Medium' => 'Medium',
                            'High' => 'High',
                        ],
                        'label' => 'Level Of Necessity *'
                    ]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('internal_comments');
                    echo $this->Form->control('attend_meet_and_greet', ['label' => 'Attend Meet And Greet *']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
