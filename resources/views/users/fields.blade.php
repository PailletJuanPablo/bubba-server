<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>


@push('scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush



<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni', 'Dni:') !!}
    {!! Form::text('dni', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Domain Field -->
<div class="form-group col-sm-6">
    {!! Form::label('domain', 'Dominio:') !!}
    {!! Form::text('domain', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-light">Cancelar</a>
</div>
