<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormData;
use Faker\Factory as Faker;

class _form_data_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker_variable = Faker::create();

        for($i=1;$i<=100;$i++){
       
        $object_variable = new FormData;

        $object_variable->student_name =$faker_variable->name;
        $object_variable->email = $faker_variable->email;
        $object_variable->password =$faker_variable->password;
        $object_variable->DOB = $faker_variable->date;
        $object_variable->save(); 

    }
    }
}  
