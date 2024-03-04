<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionnaire $questionnaire
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Questionnaire'), ['action' => 'edit', $questionnaire->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Questionnaire'), ['action' => 'delete', $questionnaire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionnaire->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Questionnaires'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Questionnaire'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="questionnaires view content">
            <h3><?= h($questionnaire->business_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $questionnaire->hasValue('project') ? $this->Html->link($questionnaire->project->full_name, ['controller' => 'Projects', 'action' => 'view', $questionnaire->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Business Name') ?></th>
                    <td><?= h($questionnaire->business_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Website') ?></th>
                    <td><?= h($questionnaire->website) ?></td>
                </tr>
                <tr>
                    <th><?= __('Completion Time') ?></th>
                    <td><?= h($questionnaire->completion_time->format('jS F Y, h:i a')) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Currently Used Technology') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($questionnaire->currently_used_technology)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Industry Of The Client') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($questionnaire->industry_of_the_client)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Project Proposal') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($questionnaire->project_proposal)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
