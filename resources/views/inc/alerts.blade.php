@if(Session::has('success'))
    <div class="callout success radius shadow">
        Session::get('success')
    </div>
@endif

@if(Session::has('error'))
    <div class="callout alert radius shadow">
        Session::get('error')
    </div>
@endif
