@extends('layouts.master')

@section('content')
    <section id="search-result" class="search-result">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="category-title">Search Results</h3>

                    @foreach($categories as $category)
                    <div class="d-md-flex post-entry-2 small-img">
                        <a href="" class="me-4 thumbnail">
                            <img src="{{$category['p_image']}}" alt="" class="img-fluid" >
                        </a>
                        <div>
                            <div class="post-meta"><span class="date">{{$category['c_name']}}</span> <span class="mx-1">&bullet;</span>
                                <span>{{$category['p_posttime']}}</span></div>
                            <h3><a href=""> {{$category['p_title']}}</a></h3>
                            <p>{{$category['p_excerpt']}}</p>
                            <div class="d-flex align-items-center author">
                                <div class="photo"><img src="assets/img/person-2.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="name">
                                    <h3 class="m-0 p-0">Wade Warren</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  

                    <!-- Paging -->
                    <div class="text-start py-4">
                        <div class="custom-pagination">
                            <a href="#" class="prev">Prevous</a>
                            <a href="#" class="active">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                            <a href="#" class="next">Next</a>
                        </div>
                    </div><!-- End Paging -->

                </div>

                @include('components.sidebar')

            </div>
        </div>
    </section>
@endsection
