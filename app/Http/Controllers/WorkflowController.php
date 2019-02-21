<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;

class WorkflowController extends Controller
{
    public function index()
    {
        $document = Document::find(1);
        return view('workflow', compact('document'));
    }
}
