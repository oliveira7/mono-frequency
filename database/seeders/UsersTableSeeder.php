<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Participant;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = Teacher::create([
            'type' => 'main',
            'is_admin' => 1
        ]);

        User::factory(1)->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'unifei_registration' => '2017000000',
            'phone_number' => '11999999999',
            'userable_type' => 'App\Models\Teacher',
            'userable_id' => $teacher->id,
        ]);

        Address::factory(1)->create([
            'user_id' => $teacher->user->id,
        ]);

        $participant = Participant::create([
            'birthday' => '1994-04-13',
        ]);

        User::factory(1)->create([
            'name' => 'Participant',
            'email' => 'aluno@aluno.com',
            'password' => bcrypt('password'),
            'unifei_registration' => '2017000000',
            'phone_number' => '11999999999',
            'userable_type' => 'App\Models\Participant',
            'userable_id' => $participant->id,
        ]);

        Address::factory(1)->create([
            'user_id' => $participant->user->id,
        ]);

        $participants = Participant::factory(3)->create();

        foreach ($participants as $participant) {
            User::factory(1)->create([
                'userable_type' => 'App\Models\Participant',
                'userable_id' => $participant->id
            ]);

            Address::factory(1)->create([
                'user_id' => $teacher->user->id
            ]);
        }

        $teachers = Teacher::factory(3)->create();

        foreach ($teachers as $teacher) {
            User::factory(1)->create([
                'userable_type' => 'App\Models\Teacher',
                'userable_id' => $teacher->id
            ]);

            Address::factory(1)->create([
                'user_id' => $teacher->user->id
            ]);
        }
    }
}
