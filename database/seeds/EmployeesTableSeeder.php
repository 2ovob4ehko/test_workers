<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->truncate();

        $employeesCount = 1000;
        $employees = factory(App\Employees::class, $employeesCount)->create();
        $employeeIds = DB::table('employees')->lists('id');
        for($i=0; $i<$employeesCount - 1; $i++) {
            $randomizedEmployeeIds = $employeeIds;
            shuffle($randomizedEmployeeIds);
            DB::table('employees')->where('id', $i)->update(['chief'=>$randomizedEmployeeIds[$i]]);
        }
    }
}
