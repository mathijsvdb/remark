@servers( ['production' => 'deploybot@139.162.159.6' ])
@task('deploy', ['on' => 'production'])
cd /home/remark/
php artisan down
git reset --hard HEAD
git pull origin master
php composer.phar dump-autoload
php artisan migrate --force
php artisan up
@endtask

