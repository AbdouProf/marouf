 <ul class="utf-dashboard-box-list" id="wislist_list">
     @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $item)
         <li>
             <div class="utf-job-listing">
                 <div class="utf-job-listing-details">
                     <a href="dashboard-manage-resume.html" class="utf-job-listing-company-logo"><img
                             src="img/company_logo_1.png" alt="" /></a>
                     <div class="utf-job-listing-description">
                         @php
                             $demande = \App\Models\Demande::where('id', $item->model->id)->first();
                         @endphp
                         @if ($item->model->cat_id == 1)
                             <span class="dashboard-status-button green"><i class="icofont-shopping-cart"></i>
                                 {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                         @elseif($item->model->cat_id == 4)
                             <span class="dashboard-status-button yellow"><i class="icofont-auto-mobile"></i>
                                 {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                         @else
                             <span class="dashboard-status-button red"><i class="icofont-fast-delivery"></i>
                                 {{ \App\Models\Category::where('id', $demande->cat_id)->value('title') }}</span>
                         @endif
                         <h3 class="utf-job-listing-title">
                             <a
                                 href="{{ route('demande.detail', $item->model->title) }}">{{ $item->model->title }}</a>

                         </h3>
                         <div class="utf-job-listing-footer">

                             <ul>
                                 <li><i class="icon-material-outline-account-balance-wallet"></i>
                                     {{ $item->model->Bmin }} TND
                                     - {{ $item->model->Bmax }} TND </li>
                                 <li><i class="icon-material-outline-location-on"></i> Sfax -
                                     Manzel
                                     Chaker</li>
                                 <li><i class="icon-material-outline-access-time"></i> 7 jours
                                 </li>

                             </ul>

                         </div>
                     </div>
                     <a href="{{ route('demande.detail', $item->model->title) }}">
                         <span class="list-apply-button ripple-effect"> Découvrir la demande

                             <i class="icon-line-awesome-bullhorn"></i>

                         </span>
                     </a>
                 </div>
                 <i class="red icon-feather-trash-2 delete_wishlist"  title="Remove" data-id={{ $item->rowId }}></i>


             </div>

         </li>
     @endforeach
 </ul>


 @section('scripts')
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">


     {{-- delete --}}
     <script>
         $('.delete_wishlist').on('click', function(e) {


             e.preventDefault();
             var rowId = $(this).data('id');
             var token = "{{ csrf_token() }}";
             var path = "{{ route('wishlist.delete') }}"



             $.ajax({
                 url: path,
                 type: "POST",
                 dataType: "JSON",
                 data: {
                     _token: token,
                     rowId: rowId,
                 },
                 beforeSend: function() {
                     $(this).html('<i class="fa fa-spinner fa-spin"> </i>');
                 },
                 success: function(data) {


                     console.log(data);
                     if (data['status']) {

                         $('body #cart-counter').html(data['cart_count']);
                         $('body #wislist_list').html(data['wislist_list']);
                         swal({
                             title: "Good job!",
                             text: data['message'],
                             icon: "success",
                             button: "OK",
                         });
                     } else {
                         swal({
                             title: "Opps!",
                             text: "Something went wrong",
                             icon: "warning",
                             button: "OK",
                         });
                     }

                 },
                 error: function(err) {
                     swal({
                         title: "Error!",
                         text: "Some error",
                         icon: "error",
                         button: "OK",
                     });
                     console.log(err);

                 }

             });


         });
     </script>
 @endsection
