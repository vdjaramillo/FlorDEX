@if(Session::has('alerts'))
    @foreach(Session::get('alerts') as $type_alert => $messages)
        <div class="alert alert-{{ $type_alert }} alert-dismissible fade show" role="alert">
            @foreach($messages as $message)
                <li>{{ $message }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif
