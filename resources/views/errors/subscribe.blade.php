@if($errors->subs->any())
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    @foreach($errors->subs->all() as $error)
                        {{$error}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
