@extends('adminlte::page')

@section('title', 'Customer Index')

@section('content_header')
    <h1>Customer Index</h1>
@stop

@section('content')

    @php
        use App\Enums\UserStatus;$heads = [
            'SL.',
            'Name',
            'Email',
            'Type',
            'Status',
        ];

        $config = [
            'paging' => true,
            'searching' => true,
            'info' => true,
            'ordering' => false,
        ];

    $badgeMapping = [
        UserStatus::actv() => 'success',
        UserStatus::iactv() => 'warning',
        UserStatus::bnnd() => 'danger',
    ];
    @endphp


    <div class="row">
        <div class="col-md-12">
            <x-adminlte-card title="Customers table" theme="lightblue" theme-mode="outline" icon="fas fa-lg fa-envelope">
                <x-adminlte-datatable id="table" :config="$config" :heads="$heads" striped hoverable>
                    @forelse($customers as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->type}}</td>
                        <td>
                            <span class="badge badge-{{get_badge_class($item->status,$badgeMapping)}}">{{$item->status}}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Data Found</td>
                    </tr>
                    @endforelse
                </x-adminlte-datatable>
            </x-adminlte-card>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
