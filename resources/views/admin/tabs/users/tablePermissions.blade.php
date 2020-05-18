@foreach($permissions as $permission)
    <tr>
        <td>{{__($permission->name)}}</td>
        <td class="" style="font-size: 150%">
            @if($user != null)
                @if($user->permissions->where('name','=',$permission->name)->count() > 0)
                    <i class="fas fa-check-circle text-success"></i>
                    <a href="{{route('userPermissionToggle',[$user->id,$permission->id,'remove'])}}"
                       class="text-dark ajax"
                       json='{{json_encode(['method'=>'get','response'=>['type'=>'html','selector'=>'#tablePermissions']])}}'
                    >
                        <i class="far fa-times-circle"></i>
                    </a>
                @else
                    <a href="{{route('userPermissionToggle',[$user->id,$permission->id,'add'])}}"
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
        </td>
    </tr>
@endforeach
