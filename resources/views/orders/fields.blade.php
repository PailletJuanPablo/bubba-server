<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::number('company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Number:') !!}
    {!! Form::text('number', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Remit Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('remit', 'Remit:') !!}
    {!! Form::textarea('remit', null, ['class' => 'form-control']) !!}
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

<!-- Sign Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('sign', 'Sign:') !!}
    {!! Form::textarea('sign', null, ['class' => 'form-control']) !!}
</div>

<!-- Dni Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni_number', 'Dni Number:') !!}
    {!! Form::text('dni_number', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Card Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('card_number', 'Card Number:') !!}
    {!! Form::text('card_number', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('orders.index') }}" class="btn btn-light">Cancel</a>
</div>
