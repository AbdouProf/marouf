@extends('backend.layouts.master')


@section('content')
<div id="dashboard-titlebar" class="utf-dashboard-headline-item">
    <div class="row">
        <div class="col-xl-12">
            <h3>My requests</h3>
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="index-1.html">Home</a></li>
                    <li><a href="dashboard.html">dashboard</a></li>
                    <li>My requests</li>
                </ul>
            </nav>
        </div>
    </div>
</div>


<div class="utf-dashboard-content-inner-aera">
    
    <div class="row">
        <div class="col-xl-12">
            @if (count($demandes) > 0)
            <div class="dashboard-box margin-top-0">
                <div class="headline">
                    <h3>List of my requests</h3>
                </div>
                <div class="content">
                    <ul class="utf-dashboard-box-list">
                        @foreach ($demandes as $item)
                        <li>
                            <div class="utf-job-listing">
                                <div class="utf-job-listing-details">

                                    <div class="utf-job-listing-company-logo">
                                        @if ($item->cat_id == 1)
            
                                        <div class="utf-category-box-icon-item"><i class="icon-feather-shopping-bag1"></i></div>
                                        @elseif ($item->cat_id == 2)
                                        <div class="utf-category-box-icon-item"><i class="icon-feather-package1"></i></div>
            
                                        @else
                                        <div class="utf-category-box-icon-item"><i class="icon-material-outline-directions-car1"></i></div>
            
                                        @endif
            
            
                                    </div>
                                            
                                    <div class="utf-job-listing-description">
                                        <span class="dashboard-status-button utf-status-item green">Mission
                                            {{ $item->Dstatus }}</span>
                                        @if ($item->approuved == 0 )
                                        <span class="dashboard-status-button utf-status-item yellow">Pending for approval</span>
                                        @endif
                                        <h3 class="utf-job-listing-title">
                                            <a href="{{ route('demande.detail', $item->title) }}">{{ $item->title }}</a>
                                            @php
                                            $demande = \App\Models\Demande::where('id', $item->id)->first();
                                            @endphp
                                            @if ($item->cat_id == 1)
                                            <span class="dashboard-status-button green"><i
                                                    class="icofont-shopping-cart"></i>
                                                {{ \App\Models\Category::where('id', $demande->cat_id)->value('title')
                                                }}</span>
                                            @elseif($item->cat_id == 4)
                                            <span class="dashboard-status-button yellow"><i
                                                    class="icofont-auto-mobile"></i>
                                                {{ \App\Models\Category::where('id', $demande->cat_id)->value('title')
                                                }}</span>
                                            @else
                                            <span class="dashboard-status-button red"><i
                                                    class="icofont-fast-delivery"></i>
                                                {{ \App\Models\Category::where('id', $demande->cat_id)->value('title')
                                                }}</span>
                                            @endif

                                            @if ($item->approuved == 1)
                                            <span class="utf-verified-badge" title="Approuved"
                                                data-tippy-placement="left"></span>
                                            @endif
                                        </h3>
                                        <div class="utf-job-listing-footer">
                                            @php
                                            $offres = \App\Models\offre::where('demande_id', $item->id)->get();
                                            $accptoffre=\App\Models\offre::where(['demande_id'=>$item->id,'ostatus'=>'Offre Accepte'])->get();
                                            @endphp
                                            <ul>
                                                <li><i class="icon-feather-briefcase"></i>
                                                    {{ $offres->count() }} </li>
                                                <li title="Créer le"><i class="icon-material-outline-date-range"></i>
                                                    {{ date_format($item->created_at, 'Y-M-d') }} </li>
                                                <li><i class="icon-material-outline-account-balance-wallet"></i>
                                                    {{ $item->Bmin }} TND
                                                    - {{ $item->Bmax }} TND </li>
                                            </ul>


                                            <div class="utf-buttons-to-right">
                                                @if (count( $accptoffre) == 0)
                                                <a href="{{route('demande.edit',$item->id)}}"
                                                    class="button green ripple-effect ico" title="Edit"
                                                    data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
                                                @endif
                                                <a href="{{ route('offre.list', $item->title) }}"
                                                    class="button green ripple-effect ico" title="Consult the offers"
                                                    data-tippy-placement="top"><i
                                                        class="icon-material-outline-gavel"></i></a>

                                                <form class="float-left ml-1"
                                                    action="{{ route('demande.delete', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" class="button dltBtn red ripple-effect ico"
                                                        data-id="{{ $item->id }}" title="Delete"
                                                        data-tippy-placement="top" data-toggle="tooltip"><i
                                                            class="icon-feather-trash-2"></i></a>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </li>
                        @endforeach
                    </ul>
                    @else
                    <h1 style="color:red;">Vous n'avez pas encore de demande</h1>
                    @endif
                </div>
              
            </div>



        </div>
    </div>
    <!-- Pagination -->
    <div class="row">
        <div class="col-md-12">
            <div class="utf-pagination-container-aera margin-top-30 margin-bottom-60">
                <nav class="pagination">
                    {{$demandes->appends($_GET)->links('vendor.pagination.custom')}}

                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">


<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function(e) {
            var form = $(this).closest('form');
            var dataId = $(this).data('id');
            e.preventDefault();
            swal({
                    title: "Are you sure ?",
                    text: "Once deleted, you will not be able to recover this request!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                        swal(" Good! Your request has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your request is not deleted!");
                    }
                });
        });
</script>
@endsection