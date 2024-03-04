<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = "Nathan's Networked Recruitment";
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="top-nav">
    <div class="top-nav-links">
        <div style="display: flex;">
            <?=
            $this->Html->image('logo.jpg', [
                'url' => ['controller' => 'projects']
            ])
            ?>
            <div style="margin: auto; text-align: center;">
                <?=
                $this->Html->link("Nathan's Networked Recruitment", [
                    'controller' => 'projects',
                ])
                ?>
                <?php
                if ($this->Identity->isLoggedIn()) {
                    // this is the sidebar for user when they have been log in
                    echo($this->Html->link("Projects", [
                        'controller' => 'projects',
                        'action' => 'index'
                    ]));
                    echo($this->Html->link("Clients", [
                        'controller' => 'clients',
                        'action' => 'index'
                    ]));
                    echo($this->Html->link("Questionnaires", [
                        'controller' => 'questionnaires',
                        'action' => 'index'
                    ]));
                    echo($this->Html->link("Users", [
                        'controller' => 'users',
                        'action' => 'index'
                    ]));
                } else {
                    // this is the sidebar for user when they haven't log in
                    echo(
                    $this->Html->link('Home', [
                        'controller' => 'Pages',
                        'action' => 'home'
                    ], [])
                    );
                }
                ?>
            </div>
        </div>
    </div>

    <div class="top-nav-links">
        <?php
        if ($this->Identity->isLoggedIn()) {
            echo(
            $this->Html->link($this->Identity->get('email').' ||', [
                'controller' => 'users',
                'action' => 'view',
                $this->Identity->get('id')
            ], []));
            // this is the sidebar for user when they have been log in
            echo(
            $this->Html->link('Log Out', [
                'controller' => 'users',
                'action' => 'logout'
            ], [])
            );

        } else {
            // this is the sidebar for user when they haven't log in
            echo(
            $this->Html->link('Login', [
                'controller' => 'users',
                'action' => 'login'
            ], [])
            );
        }
        ?>
    </div>
</nav>
<main class="root" >
    <div class="container px-4 px-lg-5 h-10">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>
<footer>
</footer>
</body>
</html>
