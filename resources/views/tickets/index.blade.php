<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tickets
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="py-12">
            <x-success-messages />

            <div class="bg-white p-10">
                <x-error-messages />

                <form action="{{ route('tickets.store') }}" method="post">
                    @csrf
                        <div class="mb-4">
                            <label for="title">Title</label>    
                            <input type="text" id="title" name="title">
                        </div>

                        <div class="mb-4">
                            <label for="description">Description</label>    
                            <textarea id="description" name="description"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="category_id">Category</label>    
                            <select name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="severity">Severity</label>    
                            <select name="severity" id="severity">
                                @foreach($severityLevels as $severity)
                                    <option value="{{ $severity }}">
                                        {{ $severity->label() }}
                                    </option>
                                @endforeach
                            </select>   
                        </div>

                        <div class="mb-4">
                            <button type="submit">Create Ticket</button>
                        </div>
                </form>
            </div>
        </div>

        <div class="pb-20">
            @foreach ($tickets as $ticket)
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg">{{ $ticket->title }}</h3>
                    <p>{{ $ticket->description }}</p>
                    <p>Category: {{ $ticket->category->name }}</p>
                    <p>Severity: {{ $ticket->severity->label() }}</p>
                    <p>Submitted By: {{ $ticket->user->name }}</p>
                    <p>Assigned To: {{ !empty($ticket->assignedTo) ? $ticket->assignedTo->name : '- Not Assigned -' }}</p>
                    <p>Status: {{ $ticket->status->label() }}</p>
                    <p>Last Updated: {{ $ticket->updated_at->format('d M Y') }}</p>

                    <form action="{{ route('tickets.update-status', $ticket) }}" method="post" class="block mb-5 mt-5">
                        @csrf
                        @method('patch')

                        <label for="status">Status:</label>
                        <select name="status" id="status">
                            @foreach($statuses as $status)
                                <option value="{{ $status }}">
                                    {{ $status->label() }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit">Update Status</button>
                    </form>

                    <form action="{{ route('tickets.assign', $ticket) }}" method="post">
                        @csrf
                        @method('patch')

                        <label for="assigned_to">Assign To:</label>
                        <select name="assigned_to" id="assigned_to">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}  
                                </option>
                            @endforeach
                        </select>
                        <button type="submit">Assign Ticket</button>
                    </form>

                    <div class="pt-10">
                        <a href="{{ route('tickets.show', $ticket) }}">View Details</a>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
