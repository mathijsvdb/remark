<?php
/**
 * Created by PhpStorm.
 * User: tommoore
 * Date: 20/11/15
 * Time: 11:28
 */

@servers( ['production' => ‘deploybot@139.162.159.6’ ])
@task('deploy', ['on' => 'production'])
cd /home/remark/
php artisan down
git reset --hard HEAD
git pull origin master
php composer.phar dump-autoload
php artisan migrate --force
php artisan up
@endtask

        <!--
@task('beta', ['on' => 'production'])
cd /home/remark/  .. BETA PATH HERE?
php artisan down
git reset --hard HEAD
git pull origin master
php composer.phar dump-autoload
php artisan migrate --force
php artisan up
@endtask -->