<div class="table-responsive">
    <table class="table" id="companies-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Imagen</th>
      
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                       <td>{{ $company->name }}</td>
            <td > <div style="max-height: 150px; overflow: hidden"> 
                <img width="150" src="{{ $company->image }}"></div></td>
         
                       <td class=" text-center">
                           {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('companies.show', [$company->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('companies.edit', [$company->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
