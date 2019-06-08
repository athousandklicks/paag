@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Hang
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($hang, ['route' => ['hangs.update', $hang->id], 'method' => 'patch']) !!}

                        @include('hangs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection