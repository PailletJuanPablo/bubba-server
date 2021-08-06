<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>Company Id</th>
        <th>User Id</th>
        <th>Number</th>
        <th>Name</th>
        <th>Remit</th>
        <th>Dni</th>
        <th>Card</th>
        <th>Sign</th>
        <th>Dni Number</th>
        <th>Card Number</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                       <td>{{ $order->company_id }}</td>
            <td>{{ $order->user_id }}</td>
            <td>{{ $order->number }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->remit }}</td>
            <td>{{ $order->dni }}</td>
            <td>{{ $order->card }}</td>
            <td>{{ $order->sign }}</td>
            <td>{{ $order->dni_number }}</td>
            <td>{{ $order->card_number }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
