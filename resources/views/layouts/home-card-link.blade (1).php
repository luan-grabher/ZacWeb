<div class="col-md-2 rounded shadow-lg px-0 m-2">
    <a href="{{route(strtolower($card['route']))}}" class="text-center">
        <img src="{{asset('images/icons/'.$card['route'].'.png')}}" class="bg-light w-100 p-3">

        <div class="card-body">
            <h2 class="font-weight-bold">
                {{__($card['route'])}}
            </h2>
        </div>
    </a>
</div>
