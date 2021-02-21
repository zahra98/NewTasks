<?php

namespace App\Providers;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use DateTime;
use App\Models\User;
use App\Models\Role;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Gate::before(function ($user, $ability) {
        //     if ($user->abilities()->contains($ability)) {
        //         return true;   
        //     }
        // });

        Gate::define('add_books',function(User $user){
            $ability = 'add_books';
            if ($user->abilities()->contains( $ability )) {
                return true;   
            }

        });

        Gate::define('show_requests',function(User $user){
            $ability = 'show_requests';
            if ($user->abilities()->contains( $ability )) {
                return true;   
            }

        });
        Gate::define('show_renters',function(User $user){
            $ability = 'show_renters';
            if ($user->abilities()->contains( $ability )) {
                return true;   
            }

        });
        Passport::routes();
 
        // $startTime = date('Y-m-d H:i:s');
        // $endTime = date('Y-m-d H:i:s',strtotime('+7 day +1 hour +30 minutes +45 seconds',strtotime($startTime)));
        // $expTime = DateTime::createFromFormat('Y-m-d H:i:s',$endTime);
        // Passport::TokenExpireIn($expTime);
        //
    }
}
