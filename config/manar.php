<?php
return [
    "classes" => 6,
    "schedules" => [
//        TODO: add as json file?
        [
            [
                'teacher_id'=>1,
                'date' => \Illuminate\Support\Facades\Date::tomorrow(),
            ],
            [
                'teacher_id'=>2,
                'date' => \Illuminate\Support\Facades\Date::tomorrow()->addHour(),
            ]
        ]
    ],
];
