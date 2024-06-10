<?php

namespace App;

use App\Models\Subject;
use Illuminate\Support\Facades\Date;

class scheduler
{
    /**
     * Invoke the class used to make schedule
     */
    public function __invoke(): void
    {
        $numClass = config('manar.classes');
        for ($i=1;$i<=$numClass;$i++){
            $this->makeSchedule($i);
        }
    }


    protected function makeSchedule($cla)
    {
        $schedule = config('manar.schedules')[date('N')-1][$cla];
        foreach ($schedule as $class){
            $date = Date::tomorrow()->setHour($class['date']);
            $subject = new Subject();
            $subject['teacher_id'] = $class['teacher_id'];
            $subject['date'] = $date;
            $subject->save();
        }
    }
}
