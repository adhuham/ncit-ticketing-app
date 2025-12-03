@if (session()->has('success'))
    <div class="bg-green-500 rounded  px-2 py-1 text-green-100 mb-5 font-medium">
        {{ session()->get('success') }}
    </div>
@endif