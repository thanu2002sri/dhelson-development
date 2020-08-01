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
        /* $users = [
            ['profile_id' => 'ADM-917000000001', 'role' => 1, 'name' => 'Dhelson Admin', 'email' => 'admin@dhelsonexpress.com', 'phone' => '1234567890', 'password' => '$2y$10$VCZRG.1bqcNR50iGE2RqT.HYZ4CWIKPMOgwqYvyl.I546aMpM41EK', 'pan' => '', 'aadhar' => '', 'profile_pic' => '', 'address' => '', 'pincode' => '', 'city' => 'Vijayawada', 'state' => 'Andhra Pradesh', 'country' => 'India'],
            ['profile_id' => 'AGT-917000000002', 'role' => 2, 'name' => 'Dhelson Agent', 'email' => 'agent@dhelsonexpress.com', 'phone' => '9100161630', 'password' => '$2y$10$VCZRG.1bqcNR50iGE2RqT.HYZ4CWIKPMOgwqYvyl.I546aMpM41EK', 'pan' => '', 'aadhar' => '', 'profile_pic' => '', 'address' => '', 'pincode' => '', 'city' => 'Vijayawada', 'state' => 'Andhra Pradesh', 'country' => 'India'],
            ['profile_id' => 'INC-917000000003', 'role' => 3, 'name' => 'Dhelson Incharge', 'email' => 'incharge@dhelsonexpress.com', 'phone' => '9200161630', 'password' => '$2y$10$VCZRG.1bqcNR50iGE2RqT.HYZ4CWIKPMOgwqYvyl.I546aMpM41EK', 'pan' => '', 'aadhar' => '', 'profile_pic' => '', 'address' => '', 'pincode' => '', 'city' => 'Vijayawada', 'state' => 'Andhra Pradesh', 'country' => 'India'],
            ['profile_id' => 'GRD-917000000004', 'role' => 4, 'name' => 'Dhelson Guard', 'email' => 'guard@dhelsonexpress.com', 'phone' => '9988776666', 'password' => '$2y$10$VCZRG.1bqcNR50iGE2RqT.HYZ4CWIKPMOgwqYvyl.I546aMpM41EK', 'pan' => '', 'aadhar' => '', 'profile_pic' => '', 'address' => '', 'pincode' => '', 'city' => 'Vijayawada', 'state' => 'Andhra Pradesh', 'country' => 'India' ],
            ['profile_id' => 'CMC-917000000005', 'role' => 5, 'name' => 'Dhelson Customer Care', 'email' => 'customercare@dhelsonexpress.com', 'phone' => '9988176666', 'password' => '$2y$10$VCZRG.1bqcNR50iGE2RqT.HYZ4CWIKPMOgwqYvyl.I546aMpM41EK', 'pan' => '', 'aadhar' => '', 'profile_pic' => '', 'address' => '', 'pincode' => '', 'city' => 'Vijayawada', 'state' => 'Andhra Pradesh', 'country' => 'India' ]
        ];
 */
        $users = array(
            array('id' => '1','profile_id' => 'ADM-917000000001','role' => '1','branch' => NULL,'name' => 'Dhelson Admin','email' => 'admin@dhelsonexpress.com','phone' => '1234567890','password' => '$2y$10$cJQYXIHG6U79OqgcXK8J9ueGUeZCsE6K8BELjzSBVccREQ1YOvqhG','pan' => '','aadhar' => '','aadhar_pic' => NULL,'profile_pic' => '','address' => '','pincode' => '','city' => 'Vijayawada','state' => 'Andhra Pradesh','country' => 'India','email_verified_at' => NULL,'remember_token' => NULL,'status' => '1','created_at' => '2020-06-27 23:07:25','updated_at' => NULL),
            array('id' => '2','profile_id' => 'AGT-917000000002','role' => '2','branch' => '','name' => 'Dhelson Agent','email' => 'agent@dhelsonexpress.com','phone' => '9100161630','password' => '$2y$10$cJQYXIHG6U79OqgcXK8J9ueGUeZCsE6K8BELjzSBVccREQ1YOvqhG','pan' => 'DFGDFG3434','aadhar' => '','aadhar_pic' => NULL,'profile_pic' => '','address' => 'Testing','pincode' => '520007','city' => 'Vijayawada','state' => 'Andhra Pradesh','country' => 'India','email_verified_at' => NULL,'remember_token' => NULL,'status' => '0','created_at' => '2020-06-27 23:07:25','updated_at' => '2020-07-13 19:51:34'),
            array('id' => '3','profile_id' => 'INC-917000000003','role' => '3','branch' => NULL,'name' => 'Dhelson Incharge','email' => 'incharge@dhelsonexpress.com','phone' => '9200161630','password' => '$2y$10$cJQYXIHG6U79OqgcXK8J9ueGUeZCsE6K8BELjzSBVccREQ1YOvqhG','pan' => 'SDGDFG345345','aadhar' => '','aadhar_pic' => NULL,'profile_pic' => '','address' => 'Testing','pincode' => '520007','city' => 'Vijayawada','state' => 'Andhra Pradesh','country' => 'India','email_verified_at' => NULL,'remember_token' => NULL,'status' => '0','created_at' => '2020-06-27 23:07:25','updated_at' => '2020-06-28 16:14:09'),
            array('id' => '4','profile_id' => 'GRD-917000000004','role' => '4','branch' => NULL,'name' => 'Dhelson Guard','email' => 'guard@dhelsonexpress.com','phone' => '9988776666','password' => '$2y$10$cJQYXIHG6U79OqgcXK8J9ueGUeZCsE6K8BELjzSBVccREQ1YOvqhG','pan' => '','aadhar' => '','aadhar_pic' => NULL,'profile_pic' => '','address' => '','pincode' => '','city' => 'Vijayawada','state' => 'Andhra Pradesh','country' => 'India','email_verified_at' => NULL,'remember_token' => NULL,'status' => '0','created_at' => '2020-06-27 23:07:25','updated_at' => NULL),
            array('id' => '5','profile_id' => 'CMC-917000000005','role' => '5','branch' => NULL,'name' => 'Dhelson Customer Care','email' => 'customercare@dhelsonexpress.com','phone' => '9988176666','password' => '$2y$10$cJQYXIHG6U79OqgcXK8J9ueGUeZCsE6K8BELjzSBVccREQ1YOvqhG','pan' => '','aadhar' => '','aadhar_pic' => NULL,'profile_pic' => '','address' => '','pincode' => '','city' => 'Vijayawada','state' => 'Andhra Pradesh','country' => 'India','email_verified_at' => NULL,'remember_token' => NULL,'status' => '0','created_at' => '2020-06-27 23:07:25','updated_at' => NULL),
            array('id' => '8','profile_id' => 'AGT-917000000006','role' => '2','branch' => 'GUNTU-0001','name' => 'Dhelson Express','email' => 'dhelsonexpress@gmail.com','phone' => '8885181833','password' => '$2y$10$cJQYXIHG6U79OqgcXK8J9ueGUeZCsE6K8BELjzSBVccREQ1YOvqhG','pan' => 'XDW3W3','aadhar' => NULL,'aadhar_pic' => '1593330216.jpg','profile_pic' => NULL,'address' => 'Testing','pincode' => '520007','city' => 'Vijayawada','state' => 'Andhra Pradesh','country' => 'India','email_verified_at' => NULL,'remember_token' => NULL,'status' => '0','created_at' => '2020-06-28 13:13:36','updated_at' => '2020-07-04 22:46:42')
        );
  
        $settings = array(
            array('id' => '1','app_version' => 'V 1.1.1','upto_3_months' => '70','upto_3_6_months' => '50','upto_6_12_months' => '40','above_12_months' => '30','transit_tax' => '18','transit_priceOne' => '1200','transit_priceTwo' => '1500','transit_priceThree' => '1800','transit_priceFour' => '2000','transit_priceFive' => '4000','month_start_date' => NULL,'month_end_date' => NULL,'status' => '0','created_at' => '2020-07-13 15:29:05','updated_at' => NULL)
          );
        

        $roles = [
            ['name' => 'Admin', 'role' => 'admin'],
            ['name' => 'Agent', 'role' => 'agent'],
            ['name' => 'Incharge', 'role' => 'incharge'],
            ['name' => 'Guard', 'role' => 'guard'],
            ['name' => 'Customer Care', 'role' => 'customercare']
        ];

        /* $branches = ['branch_id' => 'BRN-917000000001', 'agent_id' => '2', 'email' => 'Dhelson Express', 'phone' => '8885181818', 'address' => '5-190/1, Bhagyanagar, Kanuru, Vijayawada-7.', 'pincode' => '520007', 'city' => 'Vijayawada', 'state' => 'Andhra Pradesh', 'country' => 'India', 'lattitude' => '4.993040', 'logtitude' => '115.010570']; */

        $branches = array(
            array('id' => '1','branch_id' => 'GUNTU-0001','agent_id' => '8','name' => 'Dhelson Express','email' => 'dhelsonexpress_1@gmail.com','phone' => '8885181815','address' => 'Guntur - 522006, Andhra Pradesh, India','pincode' => '522006','city' => 'Guntur','state' => 'Andhra Pradesh','country' => 'India','lattitude' => '16.3202141','logtitude' => '80.4133904','status' => '1','created_at' => '2020-07-04 22:46:42','updated_at' => '2020-07-04 22:46:42')
          );
          
        Branch::insert($branches);
        User::insert($users);
        Setting::insert($settings);
        Role::insert($roles);
    }
}
