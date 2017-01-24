<?php

require 'recipe/laravel.php';

set('keep_releases', 1);

set('repository', 'https://esprendimai.me/Esprendimai/ideadesign.git');

set('writable_dirs', ['bootstrap/cache', 'storage', 'public/uploads']);

// Describe server credentials and options
server('dev', '139.162.150.119', 22)
    ->user('dev')
    ->password('MMM123123')
    ->stage('development')
    ->env('deploy_path', '/home/public_html/ideadesign.alcod.net');

after('artisan:config:cache', 'artisan:migrate');