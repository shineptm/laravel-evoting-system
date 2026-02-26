@if(session('success'))
<div class="mb-3 px-3 py-2 rounded bg-green-100 text-green-800 relative alert-box">
    <span>{{ session('success') }}</span>

    <button onclick="this.parentElement.remove()"
        class="absolute top-2 right-2 text-green-700 hover:text-green-900 font-bold">
       X
    </button>
</div>
@endif

@if(session('error'))
<div class="mb-3 px-3 py-2 rounded bg-red-100 text-red-800 relative alert-box">
    <span>{{ session('error') }}</span>

    <button onclick="this.parentElement.remove()"
        class="absolute top-2 right-2 text-red-700 hover:text-red-900 font-bold">
       X
    </button>
</div>
@endif

@if(session('warning'))
<div class="mb-3 px-3 py-2 rounded bg-yellow-100 text-yellow-800 relative alert-box">
    <span>{{ session('warning') }}</span>

    <button onclick="this.parentElement.remove()"
        class="absolute top-2 right-2 text-yellow-700 hover:text-yellow-900 font-bold">
        <i class="fas fa-times"></i>
    </button>
</div>
@endif

@if ($errors->any())
<div class="mb-3 px-3 py-2 rounded bg-red-100 text-red-800 relative alert-box">
    <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <button onclick="this.parentElement.remove()"
        class="absolute top-2 right-2 text-red-700 hover:text-red-900 font-bold">
        X
    </button>
</div>
@endif