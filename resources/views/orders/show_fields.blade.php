<!-- Company Id Field -->
<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            <p>Empresa {{ $order->company ? $order->company->name : '' }}</p>
            @if ($order->company)
            <div style="height: 100px; width: 100px; overflow: hidden; border-radius: 50%">

                <img  style="width: 100%; " src="{{$order->company->image}}">

            </div>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('user_id', 'Móvil:') !!}
            <p>{{ $order->user ? $order->user->name : '' }}</p>
        </div>
    </div>


    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('number', 'Número remito:') !!}
            <p>{{ $order->number }}</p>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('name', 'Nombre:') !!}
            <p>{{ $order->name }}</p>
        </div>
    </div>

<div class="mt-4"></div>
    <!-- Name Field -->




</div>


<!-- User Id Field -->


<!-- Number Field -->

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <p> Remito </p>
            <img class="img-fluid" src="{{$order->remit}}">
        </div>


    </div>


    <div class="col-md-4">
        <div class="form-group">
            <p> Tarjeta </p>
            <img class="img-fluid" src="{{$order->card}}">
        </div>


    </div>



    <div class="col-md-4">
        <div class="form-group">
            <p> DNI </p>
            <img class="img-fluid" src="{{$order->dni}}">
        </div>


    </div>

    <div class="col-md-4">
        <div class="form-group">
            <p> Firma </p>
            <img class="img-fluid" src="{{$order->sign}}">
        </div>


    </div>
</div>




