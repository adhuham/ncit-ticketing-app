<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tickets
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-error-messages />

                <h3>Create a Ticket</h3>
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
    </div>
</x-app-layout>
