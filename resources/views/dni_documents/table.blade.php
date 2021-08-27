<div class="table-responsive">
    <table class="table" id="dniDocuments-table">
        <thead>
            <tr>
                <th>Dni Number</th>
        <th>Dni</th>
        <th>Card</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dniDocuments as $dniDocument)
            <tr>
                       <td>{{ $dniDocument->dni_number }}</td>
            <td>{{ $dniDocument->dni }}</td>
            <td>{{ $dniDocument->card }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['dniDocuments.destroy', $dniDocument->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('dniDocuments.show', [$dniDocument->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('dniDocuments.edit', [$dniDocument->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
