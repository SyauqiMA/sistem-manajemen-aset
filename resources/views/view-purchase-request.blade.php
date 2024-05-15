@extends('templates.layout')

@section('main-content')
<div>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <h1>Purchase Request</h1>

    <a href={{route('input-purchase-request')}}>Tambah Purchase Request</a>

    <table>
        <tr>
            <th>PR Number</th>
            <th>PR Name</th>
            <th>PR Date</th>
            <th>Status</th>
        </tr>
        @foreach ($rows as $row)
            <tr>
                <td>{{$row->purchase_request_number}}</td>
                <td>{{$row->purchase_request_name}}</td>
                <td>{{$row->purchase_request_date}}</td>
                @switch($row->status)
                    @case(1)
                        <td>Pending</td>
                        @break
                    @case(2)
                        <td>Proses (Diterima oleh Direktur)</td>
                        @break
                    @case(3)
                        <td>Diterima</td>
                        @break
                    @case(4)
                        <td>Ditolak oleh Direktur</td>
                        @break
                    @case(5)
                        <td>Ditolak oleh Manajer Procurement</td>
                        @break
                    @default
                @endswitch
            </tr>
        @endforeach
    </table>
</div>    
@endsection

