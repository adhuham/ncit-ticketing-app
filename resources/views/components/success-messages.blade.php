@if (session()->has('success'))
    <div class="bg-green-500">
        {{ session()->get('success') }}
    </div>
@endif