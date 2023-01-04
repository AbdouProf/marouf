@extends('backend.layouts.master')

@section('content')

<div class="utf-dashboard-content-inner-aera" data-simplebar="">

    <div class="row">
        <div class="col-xl-12">
            <div class="utf_dashboard_list_box table-responsive recent_booking dashboard-box">
                <div class="headline">
                    <h3>Liste des paiements</h3>
                    <div class="sort-by">
                        <select class="selectpicker hide-tick">
                            <option>This Week</option>
                            <option>This Month</option>
                            <option>Last 6 Months</option>
                            <option>This Year</option>
                        </select>
                    </div>
                </div>
                <div class="dashboard-list-box table-responsive invoices with-icons">
                    <table class="table table-hover">
                        <thead>
                            <tr style="text-align:center;">
                                <th>Paiement number</th>
                                <th>Montant</th>
                                <th>Date </th>
                                <th>Status</th>
                                <th>Date de paiement</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paiements as $item)
                            <tr style="text-align:center;">
                                <td>{{ $item->paiement_number }}</td>
                                <td>{{ $item->p_mnt }}</td>
                                <td> {{ date_format($item->created_at, 'd M Y') }}</td>
                                @if($item->p_status == 0)
                                <td><span class="badge badge-pill badge-danger text-uppercase">En cours de
                                        traitement</span></td>
                                @else
                                <td><span class="badge badge-pill badge-primary text-uppercase">Paied</span></td>
                                @endif
                                @php
                                $from_date = \Carbon\Carbon::create( $item->p_DatePaiement)->format('d M Y');;
                                @endphp

                                <td><?php echo e($from_date) ; ?></td>

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
                    {{$paiements->appends($_GET)->links('vendor.pagination.custom')}}

                </nav>
            </div>
        </div>
    </div>
</div>

@endsection