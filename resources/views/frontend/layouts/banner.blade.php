<div class="clearfix"></div>
<!-- Header Container / End -->
<!-- Intro Banner  -->
<div class="intro-banner"
    data-background-image="https://images.unsplash.com/photo-1544725121-be3bf52e2dc8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1167&q=80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="utf-banner-headline-text-part">
                    <h3>There are people who need you ! </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('bannersearch')}}" method="GET">
                <div class="utf-intro-banner-search-form-block margin-top-40">
                    
                    <div class="utf-intro-search-field-item">
                        <i class="icon-feather-search"></i>
                        <input id="intro-keywords" type="text"  name="query" placeholder="Search" />
                    </div>
                    <div class="utf-intro-search-field-item">
                        <select class="selectpicker default" data-live-search="true" data-selected-text-format="count"
                            data-size="5" title="Choose your country "  id="country_id" name='country[]'>
                            <option value="">Select votre pays</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->name }}"
                                    {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                    <div class="utf-intro-search-field-item">
                        <select class="selectpicker default" data-live-search="true" data-selected-text-format="count"
                            data-size="4" title="Choose a category" id="cat_id" name='category[]' >
                            @foreach (\App\Models\Category::where('status','active')->get() as $cat)
                            <option value="{{$cat->title}}" {{old('cat_id')==$cat->id? 'selected' : ''}} >{{$cat->title}}</option>
                             @endforeach 
                        </select>
                    </div>

                   
                    <div class="utf-intro-search-button">
                        <button class="button ripple-effect"
                          type="submit"><i
                                class="icon-material-outline-search"></i> Search for a request</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="intro-stats margin-top-45 hide-under-992px">
                    <li>
                        <i class="icon-feather-loader"></i>
                        <sub class="counter_item"><strong class="">{{ $demandes->count() }}</strong> <span> In progress </span></sub>
                    </li>
                    <li>
                        <i class="icon-feather-check-circle"></i>
                        <sub class="counter_item"><strong class="counter">{{ $demandet->count() }}</strong> <span> Closed </span></sub>
                    </li>
                    <li>
                      
                        <i class="icon-feather-users"></i>
                        <sub class="counter_item"><strong class="">{{ $users->count() }}</strong>
                            <span>Users</span></sub>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
