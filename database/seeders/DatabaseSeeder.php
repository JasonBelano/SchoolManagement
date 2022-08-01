<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Room;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //Student Seed
            Student::create([
                'lastname'=>'Zoldyck',
                'firstname'=>'Killua',
                'middlename'=>'F.',
                'address'=>'Mountain Everest',
                'contact'=>'09234534563',
                'email'=>'zoldyck@hxh.com',
                'password'=>bcrypt('Kill123')
            ]);
                
            Student::create([
                'lastname'=>'Cena',
                'firstname'=>'John',
                'middlename'=>'F.',
                'address'=>'Mountain Everest',
                'contact'=>'09234534533',
                'email'=>'cena@hxh.com',
                'password'=>bcrypt('Cena123')
            ]);

            Student::create([
                'lastname'=>'Tama',
                'firstname'=>'Sai',
                'middlename'=>'G.',
                'address'=>'Planet Nimick',
                'contact'=>'09234534511',
                'email'=>'Sai@hxh.com',
                'password'=>bcrypt('Sai')
            ]);

            Student::create([
                'lastname'=>'Lori',
                'firstname'=>'Gami',
                'middlename'=>'q.',
                'address'=>'St.32 Guan',
                'contact'=>'09234514363',
                'email'=>'Lori@hxh.com',
                'password'=>bcrypt('Lori123')
            ]);

            Student::create([
                'lastname'=>'Cabanto',
                'firstname'=>'Alexis',
                'middlename'=>'T.',
                'address'=>'Greed Island',
                'contact'=>'09224534563',
                'email'=>'Cabanto@hxh.com',
                'password'=>bcrypt('Alexis123')
            ]);


            
        
        //Course Seed
          $array = array('BSIT','BSCS','BSIS','ACT-WDD','ACT-CHS');
           foreach ($array as $value) {
            Course::create(['name'=>$value]);
           }
        
        

        
        //Subject Seed
            $sub = array('IT101','IT201','SCIENCE','ALGORITHM','MATH');
                foreach ($sub as $value) {
                    Subject::create(['name'=>$value]);
                }
            

        //Section Seed
            $sec = array('A','B','C','D','E');
                foreach ($sec as $value) {
                    Section::create(['name'=>$value]);
                }
           

        //Room Seed
            for($i =0; $i<5;$i++)
            {
            Room::create(['name'=>'Room10'.$i]);
            }

        //Roles Seed
            $role = array('Admin','Teacher 1','Teacher 2','Teacher 3','Staff');
            foreach ($role as $value) {
                Role::create(['name'=> $value]);
            }
            

        //User Seed
        $role = Role::find(1);
            $role->users()->create([
                'lastname'=>'Rean',
                'firstname'=>'Francis',
                'middlename'=>'D.',
                'address'=>'31st.COA',
                'contact'=>'09234534435',
                'email'=>'Rean@hxh.com',
                'password'=>bcrypt('NoOne')
            ]);

            $role = Role::find(2);
            $role->users()->create([
                'lastname'=>'JohnSean',
                'firstname'=>'Francis',
                'middlename'=>'D.',
                'address'=>'31st.COA',
                'contact'=>'09234534435',
                'email'=>'Rean1@hxh.com',
                'password'=>bcrypt('sample')
            ]);

            $role = Role::find(3);
            $role->users()->create([
                'lastname'=>'Taguro',
                'firstname'=>'Douglas',
                'middlename'=>'D.',
                'address'=>'31st.COA',
                'contact'=>'09234534435',
                'email'=>'Rean2@hxh.com',
                'password'=>bcrypt('HelloWorld')
            ]);

            $role = Role::find(4);
            $role->users()->create([
                'lastname'=>'Picolo',
                'firstname'=>'Green',
                'middlename'=>'D.',
                'address'=>'31st.COA',
                'contact'=>'09234534435',
                'email'=>'Rean3@hxh.com',
                'password'=>bcrypt(123456)
            ]);

            $role = Role::find(1);
            $role->users()->create([
                'lastname'=>'Dendi',
                'firstname'=>'Popo',
                'middlename'=>'D.',
                'address'=>'31st.COA',
                'contact'=>'09234534435',
                'email'=>'Rean4@hxh.com',
                'password'=> bcrypt('Death123')
            ]);

        //Class Seed
            $student =Student::find(1);
            $student->classes()->create([
                'time' => '8:00 AM - 9:30 AM',
                'course_id'=>'1',
                'user_id'=> 1,
                'subject_id'=> 1,
                'section_id'=> 1,
                'room_id'=> 1
            ]);

            $student =Student::find(1);
            $student->classes()->create([
                'time' => '10:00 AM - 11:00 AM',
                'course_id'=>'1',
                'user_id'=> 5,
                'subject_id'=> 4,
                'section_id'=> 3,
                'room_id'=> 2
            ]);
            
            $student =Student::find(4);
            $student->classes()->create([
                'time' => '1:00 PM - 3:00 PM',
                'course_id'=>'1',
                'user_id'=> 3,
                'subject_id'=> 5,
                'section_id'=> 5,
                'room_id'=> 2
            ]);
            
            $student =Student::find(3);
            $student->classes()->create([
                'time' => '3:30 PM - 5:00 PM',
                'course_id'=>'1',
                'user_id'=> 1,
                'subject_id'=> 3,
                'section_id'=> 5,
                'room_id'=> 3
            ]);
            
            $student =Student::find(5);
            $student->classes()->create([
                'time' => '6:00 PM - 8:00 PM',
                'course_id'=>'1',
                'user_id'=> 2,
                'subject_id'=> 3,
                'section_id'=> 4,
                'room_id'=> 5
            ]);


            //Permission Seed
            $role =Role::find(1);
            $role->permissions()->create(['name'=>'addStudent', 'code'=>'addS']);

            $role =Role::find(1);
            $role->permissions()->create(['name'=>'editStudent', 'code'=>'editS']);

            $role =Role::find(1);
            $role->permissions()->create(['name'=>'deleteStudent', 'code'=>'deleteS']);

            $role =Role::find(1);
            $role->permissions()->create(['name'=>'retrieveStudent', 'code'=>'retrieveS']);

            $role =Role::find(1);
            $role->permissions()->create(['name'=>'addTeacher', 'code'=>'addT']);
            
                // $student = Student::find(1);
                // $student->classes()->attach([1]);
            
        //Grade
            
        Grade::create([
            'student_id'=>'1',
            'subject_id'=>'2',
            'semester1'=>'78.06',
            'semester2'=>'83.03',
            'final_remark'=>'80.45',
        ]);

    }
}
