<!-- Dni Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni_number', 'Dni Number:') !!}
    {!! Form::text('dni_number', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Dni Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('dni', 'Dni:') !!}
    {!! Form::textarea('dni', null, ['class' => 'form-control']) !!}
</div>

<!-- Card Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('card', 'Card:') !!}
    {!! Form::textarea('card', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dniDocuments.index') }}" class="btn btn-light">Cancel</a>
</div>
