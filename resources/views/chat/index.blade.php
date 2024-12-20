<!-- resources/views/chat/index.blade.php -->
<x-app-layout :assets="$assets ?? []">
    @section('content')
        <div id="app">
            <chatbox></chatbox>
        </div>
        <script src="{{ mix('resources/js/app.js') }}"></script>

    @endsection
</x-app-layout>
