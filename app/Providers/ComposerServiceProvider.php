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
        $standard_description = 'nokume.com is a free classifieds website, that helps you with all your local and international needs. Single platform for  Buy, Sell, Exchange any items online, find best tour package for your holidays or honeymoon, find jobs, get business connection worldwide, get admission in famous institutions all over the world. Put your advertisement and many more...!!!';

        $standard_keywords = 'yellowpages,classifieds,for,sale,sell,buy,online,second,hand,goods,real,estate,automobile,electronics';

        View::composer('layout', function($view) use ($standard_description, $standard_keywords) {
            $settings = new \App\Settings;
            $cities = \DB::table('cities')->take(10)->get();
            $view->with('settings', $settings);
            $view->with('cities', $cities);
            $view->with('standard_keywords', $standard_keywords);
            $view->with('standard_description', $standard_description);
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
                    ['name' => 'City', 'href' => '/admin/cities', 'icon' => 'fa fa-flag']
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
