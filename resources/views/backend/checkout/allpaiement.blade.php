@extends('admin.layouts.master')

@section('content')
<div id="dashboard-titlebar" class="utf-dashboard-headline-item">
    <div class="row">
        <div class="col-xl-12">
            <h3>All payments</h3>
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="index-1.html">Home</a></li>
                    <li><a href="dashboard.html">Dashboard</a></li>
                    <li>All payments</li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="utf-dashboard-content-inner-aera">
    <div class="row">
        <div class="col-xl-12">
            <div class="utf_dashboard_list_box table-responsive recent_booking dashboard-box">
                <div class="headline">
                    <h3>All payments</h3>
                    <div class="sort-by">
                        <a class="btn btn-primary" href="{{ route('export-allpdf') }}"><i class="icon-feather-download"></i> PDF</a>
                    </div>

                </div>

                <div class="dashboard-list-box table-responsive invoices with-icons">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Payment Number</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Zip code</th>
                                <th>Amount</th>
                                <th>Date of payment</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paiements as $item)
                            @php
                            $user = App\Models\User::where('id', $item->user_id)->first();
                            @endphp
                            <tr>
                                <td>{{ $item->paiement_number }}</td>
                                <td>{{ $item->p_name }} {{ $item->p_prenom }}</td>
                                <td>{{ $item->p_email }}</td>
                                <td>{{ $item->p_phone }}</td>
                                <td>{{ $item->p_ville }} - {{ $item->p_zip }}</td>
                                <td>{{ $item->p_mnt }}</td>
                                <td>{{ $item->p_DatePaiement }}</td>


                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    

                </div>
                

            </div>
            
            

        </div>
        

    </div>
    

</div>



@endsection

@section('scripts')
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
    rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script src="{{ asset('backend/assets/vendor/switch-button-bootstrap/src/bootstrap-switch-button.js') }}"></script>


@endsection