@extends('admin.layouts.master')

@section('content')
<div id="dashboard-titlebar" class="utf-dashboard-headline-item">
    <div class="row">
        <div class="col-xl-12">
            <h3>Approve Request</h3>
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="index-1.html">Home</a></li>
                    <li><a href="dashboard.html">dashboard</a></li>
                    <li>Approve Request</li>
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
                    <h3>Approve Request</h3>

                </div>
                <div class="dashboard-list-box table-responsive invoices with-icons">
                    <table class="table table-hover">
                        <thead>
                            <tr style="text-align:center;">
                                <th>Request Number</th>
                                <th>Username</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Budget</th>
                                <th>Approve</th>
                                <th>See Request</th>
                                <th> Reject </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($demandes)>0)
                            @foreach ($demandes as $item)
                            @php
                            $user = App\Models\User::where('id', $item->user_id)->first();
                            @endphp
                            <tr style="text-align:center;">
                                <td>{{ $item->demande_number }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $item->title }}</td>
                                @if ($item->cat_id == 1)
                                <td><span class="badge badge-pill badge-success text-uppercase">A9thili</span>
                                </td>
                                @elseif($item->cat_id == 2)
                                <td><span class="badge badge-pill badge-danger text-uppercase">Livrili</span>
                                </td>
                                @else
                                <td><span class="badge badge-pill badge-warning text-uppercase">Wasalni</span>
                                </td>
                                @endif
                                <td> {{ $item->Bmin }}-{{ $item->Bmax }} </td>
                                <td><input type="checkbox" name="verified" value="{{ $item->id }}" data-toggle="toggle"
                                        {{ $item->approuved ? 'checked' : '' }} data-on="Yes"
                                    data-off="No" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                </td>
                                <td><a href="{{ route('demande.detail', $item->title) }}" class="button gray"><i
                                            class="icon-feather-eye"></i> View
                                        Detail</a></td>
                                <td> <a href="#small-dialog-3{{ $item->id }}"
                                        class="popup-with-zoom-anim button ripple-effect " data-id="{{ $item->id }}">
                                        Reject </a>
                                    </button> </td>
                            </tr>

                            <div id="small-dialog-3{{ $item->id }}" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
                                <div class="utf-signin-form-part">
                                    <ul class="utf-popup-tabs-nav-item">
                                        <li class="modal-title">Reject </li>
                                    </ul>




                                    <div class="utf-popup-container-part-tabs">
                                        <div class="utf-popup-tab-content-item" id="tab2">
                                            <form method="post" action="{{ route('demande.rap', $item->id) }}"
                                                id="leave-review-form">
                                                @csrf
                                                <input type="hidden" name="demande_id" value="{{ $item->id }}">

                                                <textarea class="utf-with-border" placeholder="the reason for rejection ... " name="message"
                                                    id="message" cols="7" required></textarea>
                                            </form>
                                            <button class="button full-width utf-button-sliding-icon ripple-effect"
                                                type="submit" form="leave-review-form">Send Reject <i
                                                    class="icon-feather-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <td colspan="8" style="text-align:center;"> Aucune demande </td>
                            @endif



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

<script>
    $('input[name=verified]').change(function() {
                var mode = 'true' ;
                var id = $(this).val();
                $.ajax({
                    url: "{{ route('demande.verified') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        mode: mode,
                        id: id,
                    },
                    success: function(response) {
                        if (response.status) {
                            alert(response.msg);
                        } else {
                            alert("Please Try again !");
                        }
                    }
                })

            });
</script>
@endsection