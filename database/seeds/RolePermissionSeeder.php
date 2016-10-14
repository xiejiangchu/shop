<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //       $user->hasRole('owner'); // false
        //       $user->hasRole('admin'); // true
        //       $user->can('edit-user'); // false
        //       $user->can('create-post'); // true
        //       $user->hasRole(['owner', 'admin']); // true
        //       $user->can(['edit-user', 'create-post']); // true
        //       Entrust::hasRole('role-name');
        //       Entrust::can('permission-name');
        //       //  ==
        //       Auth::user()->hasRole('role-name');
        //       Auth::user()->can('permission-name');
        //       // match any admin permission
        //       $user->can("admin.*"); // true

        //       // match any permission about users
        //       $user->can("*_users"); // true
        //       $user->ability(array('admin', 'owner'), array('create-post', 'edit-user'));
        //       // or
        //       $user->ability('admin,owner', 'create-post,edit-user');

        //       Entrust::ability('admin,owner', 'create-post,edit-user');
        //       // is identical to
        //       Auth::user()->ability('admin,owner', 'create-post,edit-user');
        //       /**
        //        * @role('admin')
        //       <p>This is visible to users with the admin role. Gets translated to
        //       \Entrust::role('admin')</p>
        //       @endrole

        //       @permission('manage-admins')
        //       <p>This is visible to users with the given permissions. Gets translated to
        //       \Entrust::can('manage-admins'). The @can directive is already taken by core
        //       laravel authorization package, hence the @permission directive instead.</p>
        //       @endpermission

        //       @ability('admin,owner', 'create-post,edit-user')
        //       <p>This is visible to users with the given abilities. Gets translated to
        //       \Entrust::ability('admin,owner', 'create-post,edit-user')</p>
        //       @endability

        //        */
        //      //It is possible to use pipe symbol as OR operator:

        // 'middleware' => ['role:admin|root'];
        // //To emulate AND functionality just use multiple instances of middleware

        // 'middleware' => ['permission:owner', 'permission:writer'];
        // //For more complex situations use ability middleware which accepts 3 parameters: roles, permissions, validate_all

        // 'middleware' => ['ability:admin|owner,create-post|edit-user,true']

        $user           = new User;
        $user->name     = "管理员";
        $user->mobile   = "15121030453";
        $user->email    = "xiejiangchu@163.com";
        $user->wx       = "xiejiangchu";
        $user->verified = 1;
        $user->password = bcrypt('123456');
        $user->save();

        $test           = new User;
        $test->name     = "测试";
        $test->mobile   = "15121030452";
        $test->email    = "test@163.com";
        $test->wx       = "test";
        $test->verified = 1;
        $test->password = bcrypt('123456');
        $test->save();

        $user  = User::find(1);
        $roles = trans('globals.roles');
        foreach ($roles as $key => $value) {
            $item               = new Role;
            $item->name         = $key;
            $item->display_name = $value;
            $item->save();
        }
        $admin  = Role::where('name', 'admin')->first();
        $person = Role::where('name', 'person')->first();

        $permissions = trans('globals.permissions');
        foreach ($permissions as $key => $value) {
            $item               = new Permission;
            $item->name         = $key;
            $item->display_name = $value;
            $item->save();
            $admin->attachPermission($item);
        }

        $user->attachRole($admin);
        $test->attachRole($person);
    }
}
