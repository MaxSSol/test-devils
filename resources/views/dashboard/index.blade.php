@extends('layouts.default')

@section('content')
    <a class="btn btn-warning" href="{{route('logout')}}">Logout</a>
    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
        @if(Auth::user()->role->slug === 'admin')
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="admins-tab" data-bs-toggle="tab" data-bs-target="#admins" type="button"
                        role="tab" aria-controls="admins" aria-selected="true">Admins
                </button>
            </li>
        @endif
        @if(Auth::user()->role->slug === 'admin')
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="teamleads-tab" data-bs-toggle="tab" data-bs-target="#teamleads" type="button"
                        role="tab" aria-controls="teamleads" aria-selected="false">TeamLeads
                </button>
            </li>
        @endif
        @if(in_array(Auth::user()->role->slug, ['admin', 'teamlead']))
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="webs-tab" data-bs-toggle="tab" data-bs-target="#webs" type="button"
                        role="tab" aria-controls="webs" aria-selected="false">Webs
                </button>
            </li>
        @endif
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="stats-tab" data-bs-toggle="tab" data-bs-target="#stats" type="button"
                    role="tab" aria-controls="stats" aria-selected="false">Stats
            </button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="admins" role="tabpanel" aria-labelledby="admins-tab">Click on tab</div>
        <div class="tab-pane fade" id="teamleads" role="tabpanel" aria-labelledby="teamleads-tab">...</div>
        <div class="tab-pane fade" id="webs" role="tabpanel" aria-labelledby="webs-tab">...</div>
        <div class="tab-pane fade" id="stats" role="tabpanel" aria-labelledby="stats-tab">...</div>
    </div>

    <script src="{{ Vite::asset('resources/js/dashboard/tabs.js')}}"></script>
@endsection
