@extends('backend.layouts.master')

@section('content')
    <div class="utf-dashboard-content-inner-aera">
        <div class="row">
            <div class="col-xl-12">
                <div class="utf_dashboard_list_box table-responsive recent_booking dashboard-box">
                    <div class="headline">
                        <h3>Favoris</h3>
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
                                <tr>
                                    <th>Demande Number</th>
                                    <th>Username</th>
                                    <th>Montant</th>
                                    <th>Category</th>
                                    <th>Budget</th>
                                    <th>Approuved</th>
                                    <th>Voir Demaned</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offres as $item)
                                    @php
                                        $user = App\Models\User::where('id', $item->user_id)->first();
                                        $offre = App\Models\Offre::where('id', $item->offre_id)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $offre->offre_number }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $offre->Mnt_offre }}</td>
                                        <td> {{ $item->Bmin }}-{{ $item->Bmax }} </td>
                                        <td><input type="checkbox" name="verified" value="{{ $item->id }}"
                                                data-toggle="toggle" {{ $item->approuved ? 'checked' : '' }} data-on="Yes"
                                                data-off="No" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                        </td>
                                        <td><a href="#" class="button gray"><i class="icon-feather-eye"></i> View
                                                Detail</a></td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
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
