<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('ban'))
                <div class="alert alert-danger">
                    {{session('ban')}}
                </div>
            @endif
        </div>
    </div>
</div>
