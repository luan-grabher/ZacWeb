@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabUsers">{{__('Users')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabCompanies">{{__('Companies')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabRobots">{{__('Robots')}}</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane container active" id="tabUsers">
                @include("admin.tabs.users.permissions")
                @include("admin.tabs.users.status")
            </div>
            <div class="tab-pane container fade" id="tabCompanies">...</div>
            <div class="tab-pane container fade" id="tabRobots">...</div>
        </div>
    </div>
@endsection
