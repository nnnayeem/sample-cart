<?php

namespace Database\Seeders;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class SystemDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pass = 'adm_pass';
        $user = User::factory()->create(
            [
                'email' => 'admin@gmail.com',
                'status' => UserStatus::actv(),
                'type' => UserType::amn(),
                'password' => $pass,
            ]
        );
        $this->command->info("Admin user email:".$user->email." password:".$pass);

        $pass = 'cus_pass';
        $user = User::factory()->create(
            [
                'email' => 'cus@gmail.com',
                'status' => UserStatus::actv(),
                'type' => UserType::cus(),
                'password' => $pass,
            ]
        );
        $this->command->info("Customer email:".$user->email." password:".$pass);

        Order::factory()
            ->count(10)
            ->create(
                [
                    'user_id' => $user->id,
                ]
            )->each(function($order){
                OrderItem::factory()->count(5)->create(
                    [
                        'order_id' => $order->id
                    ]
                );
            });

        $this->command->info('System initialize data generated successfully');
    }
}
