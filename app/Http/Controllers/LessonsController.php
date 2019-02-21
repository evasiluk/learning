<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\LessonFilter;
use App\Country;

class LessonsController extends Controller
{
    public function index(LessonFilter $filters)
    {

        return Lesson::filter($filters)->get();

    }
}
