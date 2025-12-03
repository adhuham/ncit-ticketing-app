<?php

namespace App\Http\Controllers;

use App\Enums\Severity;
use App\Models\Category;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $categories = Category::all();   
        $severityLevels = Severity::cases();

        return view('tickets.index', [
            'categories' => $categories,
            'severityLevels' => $severityLevels,
        ]);
    }
}
