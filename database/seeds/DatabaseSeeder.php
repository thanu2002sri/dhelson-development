<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Setting;
use App\Role;
use App\Branch;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // password (Express!@#123)
        $users = [
            ['profile_id' => 'ADM-917000000001', 'role' => 1, 'name' => 'Dhelson Admin', 'email' => 'admin@dhelsonexpress.com', 'phone' => '1234567890', 'password' => '$2y$10$VCZRG.1bqcNR50iGE2RqT.HYZ4CWIKPMOgwqYvyl.I546aMpM41EK', 'pan' => '', 'aadhar' => '', 'profile_pic' => '', 'address' => '', 'pincode' => '', 'city' => 'Vijayawada', 'state' => 'Andhra Pradesh', 'country' => 'India'],
            ['profile_id' => 'AGT-917000000002', 'role' => 2, 'name' => 'Dhelson Agent', 'email' => 'agent@dhelsonexpress.com', 'phone' => '9100161630', 'password' => '$2y$10$VCZRG.1bqcNR50iGE2RqT.HYZ4CWIKPMOgwqYvyl.I546aMpM41EK', 'pan' => '', 'aadhar' => '', 'profile_pic' => '', 'address' => '', 'pincode' => '', 'city' => 'Vijayawada', 'state' => 'Andhra Pradesh', 'country' => 'India'],
            ['profile_id' => 'INC-917000000003', 'role' => 3, 'name' => 'Dhelson Incharge', 'email' => 'incharge@dhelsonexpress.com', 'phone' => '9200161630', 'password' => '$2y$10$VCZRG.1bqcNR50iGE2RqT.HYZ4CWIKPMOgwqYvyl.I546aMpM41EK', 'pan' => '', 'aadhar' => '', 'profile_pic' => '', 'address' => '', 'pincode' => '', 'city' => 'Vijayawada', 'state' => 'Andhra Pradesh', 'country' => 'India'],
            ['profile_id' => 'GRD-917000000004', 'role' => 4, 'name' => 'Dhelson Guard', 'email' => 'guard@dhelsonexpress.com', 'phone' => '9988776666', 'password' => '$2y$10$VCZRG.1bqcNR50iGE2RqT.HYZ4CWIKPMOgwqYvyl.I546aMpM41EK', 'pan' => '', 'aadhar' => '', 'profile_pic' => '', 'address' => '', 'pincode' => '', 'city' => 'Vijayawada', 'state' => 'Andhra Pradesh', 'country' => 'India' ],
            ['profile_id' => 'CMC-917000000005', 'role' => 5, 'name' => 'Dhelson Customer Care', 'email' => 'customercare@dhelsonexpress.com', 'phone' => '9988176666', 'password' => '$2y$10$VCZRG.1bqcNR50iGE2RqT.HYZ4CWIKPMOgwqYvyl.I546aMpM41EK', 'pan' => '', 'aadhar' => '', 'profile_pic' => '', 'address' => '', 'pincode' => '', 'city' => 'Vijayawada', 'state' => 'Andhra Pradesh', 'country' => 'India' ]
        ];

        $settings = ['app_version' => 'V 1.1.1'];
        

        $roles = [
            ['name' => 'Admin', 'role' => 'admin'],
            ['name' => 'Agent', 'role' => 'agent'],
            ['name' => 'Incharge', 'role' => 'incharge'],
            ['name' => 'Guard', 'role' => 'guard'],
            ['name' => 'Customer Care', 'role' => 'customercare']
        ];

        $branches = ['branch_id' => 'BRN-917000000001', 'agent_id' => '2', 'email' => 'Dhelson Express', 'phone' => '8885181818', 'address' => '5-190/1, Bhagyanagar, Kanuru, Vijayawada-7.', 'pincode' => '520007', 'city' => 'Vijayawada', 'state' => 'Andhra Pradesh', 'country' => 'India', 'lattitude' => '4.993040', 'logtitude' => '115.010570'];

        Branch::insert($branches);
        User::insert($users);
        Setting::insert($settings);
        Role::insert($roles);
    }
}
