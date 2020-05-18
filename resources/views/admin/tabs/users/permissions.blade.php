<div class="card mt-3 col-12 text-center p-3">
    <h3>{{__('Permissions')}}:</h3>
    <div class="row">
        {!! Form::select('user',[],null,['class'=>'form-control col-5 m-2 options-user ajax','name'=>'user','json'=>json_encode(['url'=>route('userTablePermissions','*value*'),'method'=>'get', 'response'=>['type'=>'html','selector'=>'#tablePermissions']]) ]) !!}
        <table class="table table-bordered table-striped col-6 m-2">
            <thead>
            <tr>
                <th>Permissão</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody id="tablePermissions" class="text-capitalize">
            </tbody>
        </table>
    </div>
</div>
