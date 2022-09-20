<?php

namespace Database\Seeders;

use App\Repositories\User\UserRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    private UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->userRepository->createIfNotExist(
            [
                'email' => 'zaheer15351@gmail.com',
            ],
            [
                'name' => 'Zaheer Uddin',
                'password' => Hash::make('some-password')
            ]
        );
    }
}
