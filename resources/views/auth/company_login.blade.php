@extends('layouts.auth_app')
@section('title')
    Bubba
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4> Bienvenido a Bubba</h4></div>

        <div class="card-body">
            <form method="POST" action="{{ route('processLogin') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger p-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">Seleccione empresa</label>
                   
                    <select class="form-control" id="companies"  name="company_id">
                        @foreach ($companies as $company)
                    <option data-image="{{$company->image}}" data-text="{{$company->name}}" value="{{$company->id}}">
                        {{$company->name}}
                    </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Clave de Ingreso</label>
                        <div class="float-right">
                          
                        </div>
                    </div>
                    <input aria-describedby="passwordHelpBlock" id="password" type="password"
                           value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                           placeholder="Ingrese contraseña"
                           class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                           tabindex="2" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>

             

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Ingresar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('#companies').select2({
        templateResult: formatState,
    templateSelection: formatState
    });
});

function formatState (opt) {
    if (!opt.id) {
        return opt.text.toUpperCase();
    } 

    var optimage = $(opt.element).attr('data-image'); 
    if(!optimage){
       return opt.text.toUpperCase();
    } else {                    
        var $opt = $(
            `
            <span style="display: flex; align-items: center; height: 40px">
                <div style="width: 30px; height: 30px; overflow: hidden; margin-right: 20px">
                    <img src="${optimage}" style="width: 100%"> 
                    </div>
                    <div>
                        ${opt.text.toUpperCase()}
                        </div>
              
            `
           
        );
        return $opt;
    }
};

</script>



<style>

.select2-selection__rendered, .select2-selection__arrow {
    min-height: 40px;
    height: 40px;
    line-height: 40px
}
.select2-container--classic .select2-selection--single .select2-selection__rendered {
    line-height: 40px
}
    </style>
@endsection
