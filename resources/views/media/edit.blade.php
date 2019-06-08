@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Medium
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($medium, ['route' => ['media.update', $medium->id], 'method' => 'patch']) !!}

                        @include('media.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection