<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects view content">
            <h3><?= h($project->client->first_name . " " . $project->client->surname . "'s Project (ID: " . $project->id . ")") ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $project->hasValue('client') ? $this->Html->link($project->client->first_name . " " . $project->client->surname, ['controller' => 'Clients', 'action' => 'view', $project->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Semester') ?></th>
                    <td><?= h($project->semester) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($project->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Level Of Necessity') ?></th>
                    <td><?= h($project->level_of_necessity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Contact') ?></th>
                    <td><?= h($project->last_contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Attend Meet And Greet') ?></th>
                    <td><?= $project->attend_meet_and_greet ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($project->description)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Internal Comments') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($project->internal_comments)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Questionnaires') ?></h4>
                <?php if (!empty($project->questionnaires)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Business Name') ?></th>
                            <th><?= __('Website') ?></th>
                            <th><?= __('Currently Used Technology') ?></th>
                            <th><?= __('Industry Of The Client') ?></th>
                            <th><?= __('Completion Time') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->questionnaires as $questionnaires) : ?>
                        <tr>
                            <td><?= h($questionnaires->business_name) ?></td>
                            <td><?= h($questionnaires->website) ?></td>
                            <td><?= h($questionnaires->currently_used_technology) ?></td>
                            <td><?= h($questionnaires->industry_of_the_client) ?></td>
                            <td><?= h($questionnaires->completion_time) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Questionnaires', 'action' => 'view', $questionnaires->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Questionnaires', 'action' => 'edit', $questionnaires->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questionnaires', 'action' => 'delete', $questionnaires->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionnaires->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
