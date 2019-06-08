@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sign  Location
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($signLocation, ['route' => ['signLocations.update', $signLocation->id], 'method' => 'patch']) !!}

                        @include('sign__locations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection