<?php

namespace App\Http\Controllers;

use App\Enums\Severity;
use App\Enums\Status;
use App\Http\Requests\TicketStoreRequest;
use App\Http\Requests\TicketUpdateStatusRequest;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        $categories = Category::all();   
        $severityLevels = Severity::cases();
        $statuses = Status::cases();

        $tickets = Ticket::with('category', 'user', 'assignedTo')
            ->orderBy('created_at', 'desc')
            ->get();   

        return view('tickets.index', [
            'categories' => $categories,
            'severityLevels' => $severityLevels,
            'statuses' => $statuses,
            'tickets' => $tickets,  
        ]);
    }

    public function store(TicketStoreRequest $request)
    {
        DB::transaction(function () use ($request) {
            $ticket = new Ticket();
            $ticket->user_id = $request->user()->id;
            $ticket->title = $request->input('title');
            $ticket->description = $request->input('description');
            $ticket->category_id = $request->input('category_id');
            $ticket->severity = $request->input('severity');
            $ticket->save();
        });

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    public function updateStatus(Ticket $ticket, TicketUpdateStatusRequest $request)
    {
        $ticket->status = $request->input('status');
        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Ticket status updated successfully.');
    }
}
