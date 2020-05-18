<div class="card mt-3 col-12 text-center p-3">
    <h3>{{__('Status')}}:</h3>
    <div class="row">
        {!! Form::select('user',[],null,['class'=>'form-control col-5 m-2 options-user ajax','name'=>'user','json'=>json_encode(['url'=>route('userTablePermissions','*value*'),'method'=>'get', 'response'=>['type'=>'html','selector'=>'#userStatus']]) ]) !!}
        <div id='userStatus' class="col-6">
            @if($user ?? '' != null)
                @if($user ?? ''->permissions->where('name','=',$permission->name)->count() > 0)
                    <i class="fas fa-check-circle text-success"></i>
                    <a href="{{route('userPermissionToggle',[$user ?? ''->id,$permission->id,'remove'])}}"
                       class="text-dark ajax"
                       json='{{json_encode(['method'=>'get','response'=>['type'=>'html','selector'=>'#tablePermissions']])}}'
                    >
                        <i class="far fa-times-circle"></i>
                    </a>
                @else
                    <a href="{{route('userPermissionToggle',[$user ?? ''->id,$permission->id,'add'])}}"
                       class="text-dark ajax"
                       json='{{json_encode(['method'=>'get','response'=>['type'=>'html','selector'=>'#tablePermissions']])}}'
                    >
                        <i class="far fa-check-circle"></i>
                    </a>
                    <i class="fas fa-times-circle text-danger"></i>
                @endif
            @else
                -
            @endif
        </div>
    </div>
</div>
