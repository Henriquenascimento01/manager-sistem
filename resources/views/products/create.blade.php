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
                     <h3 class="card-title">Cadastrar produto</h3>
                     <div class="card-tools">
                         <a href="{{ route('products.index') }}" class="btn btn-success">Todos os produtos</a>
                     </div>
                 </div>
                 <div class="card-body">
                     <div class="card-body p-0">
                         <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                             @include('products.form')
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection