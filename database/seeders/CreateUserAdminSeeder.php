<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateUserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'ali abou el gomboz', 
            'email' => 'gomboz.ali@gmail.com',
            'password' => bcrypt('123123'),
            'roles_users' => ["owner"],
            'status' => 'مفعل',
        ]);
      
        $role = Role::create(['name' => 'owner']);
       
        $permissions = Permission::pluck('id','id')->all();
      
        $role->syncPermissions($permissions);
       
        $user->assignRole([$role->id]);
    
    
    }
}
