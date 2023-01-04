@extends('backend.layouts.master')


@section('content')
<div id="dashboard-titlebar" class="utf-dashboard-headline-item">
  <div class="row">
      <div class="col-xl-12">
          <h3>My Claim  </h3>
          <nav id="breadcrumbs">
              <ul>
                  <li><a href="index-1.html">Home</a></li>
                  <li><a href="dashboard.html">Dashboard</a></li>
                  <li>My Claim </li>
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
                <h3>My Claim</h3>
                
              </div>
            <div class="dashboard-list-box table-responsive invoices with-icons">
              <table class="table table-hover">
                <thead>
                  <tr style="text-align:center;">
                    <th>Claim Number</th>
                    <th>Objet</th>
                    <th>Date</th>
                    <th>Payment Type</th>
                    <th>Status</th>
                    <th>Détail</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($recs as $item)
                    @php
                    $offre = \App\Models\user::where('id', $item->demande_id)->first();
                    @endphp

                  <tr style="text-align:center;">
                    <td>  {{ $item->rec_number }}</td>
                    <td> {{ $item->robject}}</td>
                    <td>{{ date_format($item->created_at, 'd M Y') }}</td>
                    <td>Stripe</td>
                    @if ($item->rstatus == 'en cours')
                    <td><span class="badge badge-pill badge-danger text-uppercase">En cours</span></td>
                    @else
                    <td><span class="badge badge-pill badge-primary text-uppercase">Terminer</span></td>
                    @endif
                    <td><a href="{{route('rec-det',$item->id)}}" class="button gray"><i class="icon-feather-eye"></i> View Detail</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>	
    <!-- Pagination -->
    <div class="row">
      <div class="col-md-12">
          <div class="utf-pagination-container-aera margin-top-30 margin-bottom-60">
              <nav class="pagination">
                  {{$recs->appends($_GET)->links('vendor.pagination.custom')}}

              </nav>
          </div>
      </div>
  </div>
</div>

@endsection