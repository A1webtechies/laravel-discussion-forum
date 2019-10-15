    <?php

    use Illuminate\Database\Seeder;

    class UserTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            App\User::create([
                'name' => "Admin",
                'password' => bcrypt('admin'),
                'email' => 'admin@letus-know.com',
                'admin' => 1,
                'avatar' => 'https://via.placeholder.com/150'
            ]);
            App\User::create([
                'name' => "Qalib Abbas",
                'password' => bcrypt('qalib'),
                'email' => 'dev@letus-know.com',
                'avatar' => 'https://via.placeholder.com/150'
            ]);
        }
    }
