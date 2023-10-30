@extends('layouts.app')

@section('template_title')
    Inventarioproducto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Inventarioproducto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('inventarioproductos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Inventario Id</th>
										<th>Producto Id</th>
										<th>Cantidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventarioproductos as $inventarioproducto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $inventarioproducto->inventario_id }}</td>
											<td>{{ $inventarioproducto->producto_id }}</td>
											<td>{{ $inventarioproducto->cantidad }}</td>

                                            <td>
                                                <form action="{{ route('inventarioproductos.destroy',$inventarioproducto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('inventarioproductos.show',$inventarioproducto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('inventarioproductos.edit',$inventarioproducto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $inventarioproductos->links() !!}
            </div>
        </div>
    </div>
@endsection
