@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    @php
        $heads = [
            'ID',
            'Name',
            ['label' => 'Phone', 'width' => 40],
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];

        $config = [
            'paging' => true,
            'searching' => true,
            'info' => true,
            'ordering' => false,
        ];
    @endphp


    <div class="row">
        <div class="col-md-12">
            <x-adminlte-card title="Passenger Listing" theme="lightblue" theme-mode="outline" icon="fas fa-lg fa-envelope">
                <x-adminlte-datatable id="table" :config="$config" :heads="$heads" striped hoverable>
                    <tr>
                        <td>1</td>
                        <td>Nayeem</td>
                        <td>+880</td>
                        <td>test</td>
                    </tr>
                </x-adminlte-datatable>
            </x-adminlte-card>
        </div>
    </div>



















@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
