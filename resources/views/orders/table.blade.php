<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>Empresa</th>
        <th>Usuario</th>
        <th>Numero</th>
        <th>Nombre</th>
        <th>Remito</th>
      
      
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                       <td>{{ $order->company_id }}</td>
            <td>{{ $order->user_id }}</td>
            <td>{{ $order->number }}</td>
            <td>{{ $order->name }}</td>
            <td>
                <div style="max-height: 150px; overflow: hidden">
<img src="{{ $order->remit }}" width="150">
                </div>
                
            
            </td>
           
                       <td class=" text-center">
                           {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
