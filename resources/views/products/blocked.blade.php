 @extends('layouts.app')

 @section('title')
 <h1>Produtos</h1>
 @endsection

 @section('breadcrumb')
 <li class="breadcrumb-item">
     <a href="#">Resumo</a>
 </li>
 @endsection

 @section('content')
 <div class="container-fluid">
     <div class="row justify-content-center">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h3 class="card-title">Listagem</h3>
                     <div class="card-tools">
                         <a href="{{ route('products.create')}}" class="btn btn-success">Produtos bloqueados</a>
                     </div>
                 </div>
                 <div class="card-body">
                     <div class="card-body p-0">
                         <table class="table">
                             <thead>
                                 <tr>
                                     <th>Nome</th>
                                     <th>Categoria</th>
                                     <th>Status</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($products as $product)
                                 <tr>
                                     <td>{{ $product->name }}</td>
                                     <td>{{ $product->category}}</td>
                                     <td>{{ $product->status}}</td>

                                     <!-- <td>
                                         <a href="{{ route('products.edit', $product ) }}" class="btn btn-warning">Editar</a>
                                     </td> -->
                                     <td>
                                         <form action="{{ route('products-block', $product) }}" method="POST" class="form-group">
                                             @csrf
                                             @method('PATCH')
                                             <button type="submit" class="btn btn-warning">Desbloquear</button>
                                         </form>
                                     </td>
                                     <!-- <td>
                                         <form action="{{ route('products.destroy', $product) }}" method="POST" class="form-group">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-danger">Apagar</button>
                                         </form>
                                     </td> -->

                                 </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>

                     <div class="card-footer clearfix">
                     </div>
                 </div>
             </div>
         </div>
     </div>
     @endsection