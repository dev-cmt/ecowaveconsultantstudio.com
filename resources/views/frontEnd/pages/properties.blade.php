<x-frontend-layout>
@section('title', 'Home')
@section('breadcrumb')
    <div style="margin-top: 85px"></div>
@endsection
@section('content')
    <!-- ============================ All Property ================================== -->
    <section class="gray-simple">
        <div class="container">

            <div class="row m-0">
                <div class="short_wraping">
                    <div class="row align-items-center">

                        <div class="col-lg-2 col-md-6 col-sm-12  col-sm-6">
                            <ul class="shorting_grid">
                                <li>
                                    <a href="grid-layout-with-sidebar.html">
                                        <span class="svg-icon text-muted-2 svg-icon-2hx">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"/>
                                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"/>
                                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"/>
                                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"/>
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="list-layout-with-sidebar.html">
                                        <span class="svg-icon text-main svg-icon-2hx">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" d="M14 10V20C14 20.6 13.6 21 13 21H10C9.4 21 9 20.6 9 20V10C9 9.4 9.4 9 10 9H13C13.6 9 14 9.4 14 10ZM20 9H17C16.4 9 16 9.4 16 10V20C16 20.6 16.4 21 17 21H20C20.6 21 21 20.6 21 20V10C21 9.4 20.6 9 20 9Z" fill="currentColor"/>
                                                <path d="M7 10V20C7 20.6 6.6 21 6 21H3C2.4 21 2 20.6 2 20V10C2 9.4 2.4 9 3 9H6C6.6 9 7 9.4 7 10ZM21 6V3C21 2.4 20.6 2 20 2H3C2.4 2 2 2.4 2 3V6C2 6.6 2.4 7 3 7H20C20.6 7 21 6.6 21 6Z" fill="currentColor"/>
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-7 col-md-12 col-sm-12 order-lg-2 order-md-3 elco_bor col-sm-12">
                            <div class="shorting_pagination">
                                <div class="shorting_pagination_laft">
                                    <h5>Showing 1-25 of 72 results</h5>
                                </div>
                                <div class="shorting_pagination_right">
                                    <ul>
                                        <li><a href="javascript:void(0);" class="active">1</a></li>
                                        <li><a href="javascript:void(0);">2</a></li>
                                        <li><a href="javascript:void(0);">3</a></li>
                                        <li><a href="javascript:void(0);">4</a></li>
                                        <li><a href="javascript:void(0);">5</a></li>
                                        <li><a href="javascript:void(0);">6</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12 order-lg-3 order-md-2 col-sm-6 pe-0">
                            <div class="shorting-right">
                                <label class="me-2">Short By:</label>
                                <div class="shorting-by border rounded">
                                    <select id="shorty" class="form-control rounded">
                                        <option value="">&nbsp;</option>
                                        <option value="1">Low Price</option>
                                        <option value="2">High Price</option>
                                        <option value="3">Most Popular</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="filter_search_opt">
                        <a href="javascript:void(0);" class="btn btn-dark full-width mb-4" onclick="openFilterSearch()">
                            <span class="svg-icon text-light svg-icon-2hx me-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"/>
                                </svg>
                            </span>Open Filter Option
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- property Sidebar -->
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="simple-sidebar sm-sidebar" id="filter_search"  style="left:0;">

                        <div class="search-sidebar_header">
                            <h4 class="ssh_heading">Close Filter</h4>
                            <button onclick="closeFilterSearch()" class="w3-bar-item w3-button w3-large"><i class="fa-regular fa-circle-xmark fs-5 text-muted-2"></i></button>
                        </div>

                        <!-- Find New Property -->
                        <div class="sidebar-widgets">

                            <!-- Find New Property -->
                            <div class="sidebar-widgets">

                                <div class="form-group simple">
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="Neighborhood">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                </div>

                                <div class="form-group simple">
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="Location">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                </div>

                                <div class="form-group simple">
                                    <div class="simple-input">
                                        <select id="ptypes" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="1">Apartment</option>
                                            <option value="2">Condo</option>
                                            <option value="3">Family</option>
                                            <option value="4">Houses</option>
                                            <option value="5">Villa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group simple">
                                    <div class="simple-input">
                                        <select id="status" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="1">For Rent</option>
                                            <option value="2">For Buy</option>
                                            <option value="3">For Sale</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group simple">
                                    <div class="simple-input">
                                        <select id="bedrooms" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group simple">
                                    <div class="simple-input">
                                        <select id="bathrooms" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group simple">
                                    <div class="simple-input">
                                        <select id="built" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <option value="1">2010</option>
                                            <option value="2">2011</option>
                                            <option value="3">2012</option>
                                            <option value="4">2013</option>
                                            <option value="5">2014</option>
                                            <option value="6">2015</option>
                                            <option value="7">2016</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="simple-input">
                                                <input type="text" class="form-control" placeholder="Min Price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="simple-input">
                                                <input type="text" class="form-control" placeholder="Max Price">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                                        <h6>Choose Price</h6>
                                        <div class="rg-slider">
                                                <input type="text" class="js-range-slider" name="my_range" value="" />
                                        </div>
                                    </div>
                                </div>

                                <div class="ameneties-features">
                                    <div class="form-group" id="module">
                                        <a role="button" class="" data-bs-toggle="collapse" href="#advance-search" aria-expanded="true" aria-controls="advance-search"></a>
                                    </div>
                                    <div class="collapse" id="advance-search" aria-expanded="false" role="banner">
                                        <ul class="no-ul-list">
                                            <li>
                                                <div class="form-check">
                                                    <input id="a-1" class="form-check-input" name="a-1" type="checkbox">
                                                    <label for="a-1" class="form-check-label">Air Condition</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input id="a-2" class="form-check-input" name="a-2" type="checkbox">
                                                    <label for="a-2" class="form-check-label">Bedding</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input id="a-3" class="form-check-input" name="a-3" type="checkbox">
                                                    <label for="a-3" class="form-check-label">Heating</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input id="a-4" class="form-check-input" name="a-4" type="checkbox">
                                                    <label for="a-4" class="form-check-label">Internet</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input id="a-5" class="form-check-input" name="a-5" type="checkbox">
                                                    <label for="a-5" class="form-check-label">Microwave</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input id="a-6" class="form-check-input" name="a-6" type="checkbox">
                                                    <label for="a-6" class="form-check-label">Smoking Allow</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input id="a-7" class="form-check-input" name="a-7" type="checkbox">
                                                    <label for="a-7" class="form-check-label">Terrace</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input id="a-8" class="form-check-input" name="a-8" type="checkbox">
                                                    <label for="a-8" class="form-check-label">Balcony</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input id="a-9" class="form-check-input" name="a-9" type="checkbox">
                                                    <label for="a-9" class="form-check-label">Icon</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <button class="btn btn-primary fw-medium rounded full-width">Find New Home</button>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Sidebar End -->

                </div>

                <div class="col-lg-9 col-md-12 list-layout">
                    <div class="row justify-content-center">
                        @foreach ($properties as $property)
                            <!-- Single Property Start -->
                            <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                @include('frontEnd.include.__property_list', ['property' => $property])
                            </div>
                            <!-- Single Property End -->
                        @endforeach
				    </div>
				</div>
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    {{ $properties->links('vendor.pagination.custom') }}
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ All Property ================================== -->

@endsection
</x-frontend-layout>
