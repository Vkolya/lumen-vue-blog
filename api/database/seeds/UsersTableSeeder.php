<?php
use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    const DEFAULT_USER = [
            'name' => 'kolya',
            'email' => 'vkolia@mail.ua',
            'password' => '$2y$10$y2Y.iRScgVjeJtXT21ofsOlaD/zO.nanyc/eX0wLrRpAXJ9bkjCjy', //111111
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Entities\User::create(self::DEFAULT_USER);
        factory(\App\Entities\User::class, 4)->create();
    }
}