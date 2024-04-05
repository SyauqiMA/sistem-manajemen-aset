<div>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <h1>Purchase Request</h1>

    <a href="/purchase-request/add">Tambah Purchase Request</a>

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
                        <td>Proses</td>
                        @break
                    @case(3)
                        <td>Diterima</td>
                        @break
                    @case(4)
                        <td>Ditolak</td>
                        @break
                    @default
                @endswitch
            </tr>
        @endforeach
    </table>
</div>
