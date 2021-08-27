@extends('layouts.app')
@section('title')
    Dni Documents 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dni Documents</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('dniDocuments.create')}}" class="btn btn-primary form-btn">Dni Document <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('dni_documents.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

