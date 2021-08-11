@extends('layouts.app')
@section('title')
    Remitos 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Remitos</h1>
           
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('orders.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

