<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th >Empresa</th>
                <th >Fecha</th>

                <th >Móvil</th>
                <th >Numero Remito </th>
                <th >Nombre</th>


                <th >Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>

                <td>
                    @if ($order->company)
                    <div style="display: flex; align-items: center">

                        <div
                        style="margin-top: 20px; width: 25px; height: 25px; margin-right: 20px; border-radius: 50%; overflow: hidden; margin-bottom: 20px">
                        <img src="{{ $order->company->image }}" width="75">
                    </div>
                   <div> {{$order->company->name}}</div>
                    </div>
                   

                    @else
                    -
                    @endif
                    




                </td>
                <td><div class="td-content">{{ $order->created_at->format('d-m-Y H:00') }}</div></td>


                <td><div class="td-content">{{ $order->user ? $order->user->name : '-' }}</div></td>
                <td><div class="td-content">{{ $order->number }}</div></td>
                <td><div class="td-content">{{ $order->name }}</div></td>


                <td >
                    <div class="td-content">


                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-light action-btn '><i
                                class="fa fa-eye"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger
                        action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record
                        ?")']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>