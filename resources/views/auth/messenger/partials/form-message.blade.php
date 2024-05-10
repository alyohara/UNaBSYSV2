<h2>Agrega un nuevo Mensaje</h2>
<form action="{{ route('messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}

    <!-- Message Form Input -->

    <div class="form-group form-floating mb-3">
        <textarea name="message"  class="form-control" style="height: 150px">{{ old('message') }}</textarea>
        <label for="floatingName">Mensaje</label>
        @if ($errors->has('message'))
            <span class="text-danger text-left">{{ $errors->first('message') }}</span>
        @endif
    </div>

    @if($users->count() > 0)
        <div class="h6 pb-2 mb-4 text-success border-bottom border-success">
            Destinatario/s <span class="small text-small"> (puede seleccionar más de uno)</span>
        </div>

        <select class="multi" name="recipients[]" autofocus id="recipients[]" multiple="multiple" size="5" style="width: 100%">

            @foreach($users as $user)
                <option value="{{ $user->id }}" title="{{ $user->username }}">{{ $user->userData->name.' '.$user->userData->lastname  }}</option>
            @endforeach

        </select>

        @if ($errors->has('recipients'))
            <span class="text-danger text-left">{{ $errors->first('recipients') }}</span>
        @endif



        <script>
            $(document).ready(function() {
                $('.multi').select2();
            });

        </script>
    @endif

    <!-- Submit Form Input -->
    <button class=" btn b btn-primary "  style="margin-top: 20px" type="submit">Enviar</button>

    <a style="margin-bottom: 5px; float: right; margin-top: 20px" href="#" class="  btn btn-secondary "
       onclick="window.history.back();">Volver</a>
</form>
