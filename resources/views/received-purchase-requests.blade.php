<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    <div>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
        <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
        <h1>Received Purchase Request</h1>
    
        <table>
            <tr>
                <th>No</th>
                <th>PR Number</th>
                <th>PR Name</th>
                <th>PR Date</th>
                <th>Aksi</th>
            </tr>
            @foreach ($rows as $row)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->purchase_request_number}}</td>
                    <td>{{$row->purchase_request_name}}</td>
                    <td>{{$row->purchase_request_date}}</td>
                    <td>TODO</td>
                </tr>
            @endforeach
        </table>
    </div>
    
</div>
