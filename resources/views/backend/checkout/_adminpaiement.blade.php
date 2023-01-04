<!doctype html>
<html lang="en">
  <head>
    <title>Liste des Paiement</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:darkorange;
  color: white;
}
    </style>
</head>
  <body>
      <div class="container py-5">
          <div class="card mt-4">
              <div class="card-header">
                    <h2 class="" style="text-align: center">Payment list</h2>
              </div>
              <div class="card-body">
                    <table id="customers">
                        <thead>
                            <tr>
                                <th>Payment Number</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>City </th>
                                <th>Amount</th>
                                <th> RIB <th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($paiements as $item)
                                @php
                                    $user = App\Models\User::where('id', $item->user_id)->first();
                                @endphp
                                <tr>
                                    <td>{{ $item->paiement_number }}</td>
                                    <td>{{ $item->p_name }}</td>
                                    <td>{{ $item->p_phone }}</td>
                                    <td>{{ $item->p_ville }}</td>
                                    <td>{{ $item->p_mnt }}</td>
                                    <td>{{ $item->RIB }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
              </div>
          </div>
      </div>
  </body>
</html>