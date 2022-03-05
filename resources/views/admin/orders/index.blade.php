@extends('adminlte::page')

@section('title', 'Orders Index')

@section('content_header')
    <h1>Orders Index</h1>
@stop

@section('content')

    @php

        use App\Enums\OrderStatus;$heads = [
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
            OrderStatus::accepted() => 'warning',
            OrderStatus::pending() => 'warning',
            OrderStatus::delivering() => 'info',
            OrderStatus::delivered() => 'success',
            OrderStatus::cancelled() => 'danger',
        ];
    @endphp


    <div class="row">
        <div class="col-md-12">
            <x-adminlte-card title="Orders table" theme="lightblue" theme-mode="outline" icon="fas fa-lg fa-envelope">
                <x-adminlte-datatable id="table" :config="$config" :heads="$heads" striped hoverable>
                    @forelse($orders as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->user?->name}}</td>
                        <td>{{$item->user?->email}}</td>
                        <td>{{$item->total_price}}</td>
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
