<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layout', function($view) {
            $settings = new \App\Settings;
            $view->with('settings', $settings);
        });
        View::composer('admin.layout', function($view) {
            $not_approved = \App\Classified::where('approved', false)->count();
            $links = [
                ['name' => 'Dashboard', 'href' => '/admin/dashboard', 'icon' => 'fa-dashboard'],
                ['name' => 'Classifieds', 'href' => '/admin/classifieds', 'icon' => 'fa-files-o', 'alert' => $not_approved],
            ];
            $privilege = auth()->user()->userable->privilege;
            if($privilege < 3) {
                $links = array_merge($links, [
                    ['name' => 'Members', 'href' => '/admin/members', 'icon' => 'fa-users'],
                    ['name' => 'Categories', 'href' => '/admin/categories', 'icon' => 'fa-tag'],
                ]);
            }
            if($privilege < 2) {
                $links = array_merge($links, [
                    ['name' => 'Administrators', 'href' => '/admin/admins', 'icon' => 'fa-user'],
                    ['name' => 'Settings', 'href' => '/admin/settings', 'icon' => 'fa-cog']
                ]);
            }
            $view->with('links', $links);

            $admin_roles = [
                3 => 'Editor',
                2 => 'Moderator',
                1 => 'Administrator',
                0 => 'Master'
            ];
            $view->with('role', $admin_roles[auth()->user()->userable->privilege]);
        });
        View::composer('classifieds', function($view) {
            $featured = \App\Classified::all()->random(3);
            $view->with('featured', $featured);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
