@extends('admin.layouts.master')


@section('content')
<div id="dashboard-titlebar" class="utf-dashboard-headline-item">
  <div class="row">
      <div class="col-xl-12">
          <h3>Tous les réclamations</h3>
          <nav id="breadcrumbs">
              <ul>
                  <li><a href="index-1.html">Accueil</a></li>
                  <li><a href="dashboard.html">Tableau de bord</a></li>
                  <li>Tous les réclamations</li>
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
                <h3>All claims</h3>
                
              </div>
            <div class="dashboard-list-box table-responsive invoices with-icons">
              <table class="table table-hover">
                <thead>
                  <tr style="text-align:center;">
                    <th>Claims number</th>
                    <th>Profile</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($recs as $item)
                    @php
                    $offre = \App\Models\user::where('id', $item->demande_id)->first();
                    $user = App\Models\User::where('id', $item->user_id)->first();
                    @endphp

                  <tr style="text-align:center;">
                    <td>  {{ $item->rec_number }}</td>
                    <td><img alt="" class="img-fluid rounded-circle shadow-lg" src="/{{ $user->image }}" width="50" height="50" data-tippy-placement="top" title="{{ ucfirst($user->name) }}" data-tippy="" /></td>
                    <td> {{ $item->robject}}</td>
                    <td>{{ date_format($item->created_at, 'Y M d') }}</td>
                    @php
                    $demande = \App\Models\Demande::where('id', $item->demande_id)->first();
                    $userid = $demande->user_id;
                    @endphp

                    @if ($item->user_id ==  $userid)
                    <td> Demandeur </td>
                    @else
                    <td> Offreur </td>
                    @endif
                    @if ($item->rstatus == 'en cours')
                    <td><span class="badge badge-pill badge-danger text-uppercase">En cours</span></td>
                    @else
                    <td><span class="badge badge-pill badge-primary text-uppercase">Terminer</span></td>
                    @endif
                    <td><a href="{{route('admin.recdet',$item->id)}}" class="button gray"><i class="icon-feather-eye"></i> View Detail</a></td>
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