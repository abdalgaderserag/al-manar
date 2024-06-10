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
        $schedule = config('manar.schedules')[date('N')][$cla];
        $date = Date::tomorrow()->setHour(config('manar.date.first'));
        $date->subMinutes(config('manar.date.class'));
        $date->subMinutes(config('manar.date.break'));
        foreach ($schedule as $class){
            $date->addMinutes(config('manar.date.class'));
            $date->addMinutes(config('manar.date.break'));
            $subject = new Subject();
            $subject['teacher_id'] = $class['teacher_id'];
            $subject['date'] = $date;
            $subject->save();
        }
    }
}
