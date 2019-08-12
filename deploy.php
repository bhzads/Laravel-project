<?php

namespace Deployer;

require_once __DIR__. '/vendor/in10/deployment/recipes/in10.recipe.php';
require_once 'recipe/laravel.php';

set('application', 'my-wp-pre-project');
set('repository', 'git@github.com:bhzads/my-wp-pre-project.git');


// to do
host('my')
    ->hostname('')
    ->user('')
    ->stage('acceptance') // this task can see in vendor recipe.php
    ->set('keep_releases', 2)
    ->set('deploy_path', '~/www');


// for more ifno:  https://deployer.org/docs/getting-started.html
