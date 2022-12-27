@section('title', 'Anasayfa')
<x-app-layout>
    <div class="container text-center">
        {{-- Top-Content Start --}}
        @include('dashboard-content.top-content')
        {{-- Top-Content End --}}
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                {{-- Left-Content Start --}}
                @include('dashboard-content.left-content')
                {{-- Left-Content End --}}
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12">
                {{-- Right-Content Start --}}
                @include('dashboard-content.right-content')
                {{-- Right-Content End --}}
            </div>
        </div>
    </div>
</x-app-layout>
