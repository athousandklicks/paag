@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sign
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sign, ['route' => ['signs.update', $sign->id], 'method' => 'patch']) !!}

                        @include('signs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection