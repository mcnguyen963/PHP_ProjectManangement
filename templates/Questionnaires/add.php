<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionnaire $questionnaire
 * @var \Cake\Collection\CollectionInterface|string[] $projects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?php
            if ($this->Identity->isLoggedIn()) {
                echo($this->Html->link(__('Log Out'), ['controller'=>'Users','action' => 'logout'], ['class' => 'side-nav-item']));

            } else {
                // this is the sidebar for user when they haven't log in
                echo($this->Html->link(__('Login'), ['controller'=>'Users','action' => 'index'], ['class' => 'side-nav-item']));
            }
            ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="questionnaires form content">
            <?= $this->Form->create($questionnaire) ?>
            <fieldset>
                <legend><?= __('Add Questionnaire') ?></legend>
                <?php
                echo $this->Form->control('business_name', ['label' => 'Business Name *']);
                echo $this->Form->control('website');
                echo $this->Form->control('currently_used_technology');
                echo $this->Form->control('industry_of_the_client');
                echo $this->Form->control('project_proposal');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
