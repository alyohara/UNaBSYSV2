@if(isset ($errors) && count($errors) > 0)
    <div class="alert alert-warning" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close" style="float: right"></button>
    </div>
@endif

@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="alert alert-info" role="alert">
                <i class="fa fa-check"></i>
                {{ $msg }}
                <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close" style="float: right"></button>
            </div>

        @endforeach
    @else
        <div class="alert alert-info" role="alert">
            <i class="fa fa-check"></i>
            {{ $data }}
            <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close" style="float: right"></button>
        </div>
    @endif
@endif
