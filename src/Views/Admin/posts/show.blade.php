@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Chi tiết : {{ $posts['c_name'] }}</h1>

       
    </div>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="container shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="row">
                    <table class="table">
                        <tr>
                            <th>Trường dữ liệu</th>
                            <th>Gía trị</th>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>{{ $posts['p_id'] }}</td>
                        </tr>
                        <tr>
                            <td>title</td>
                            <td>{{ $posts['p_title'] }}</td>
                        </tr>
                        <tr>
                            <td>Excerpt</td>
                            <td>{{ $posts['p_excerpt'] }}</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>{{ $posts['p_content'] }}</td>
                        </tr>
                        
                    </table>
                </div>
                <!-- Card Body -->
                
            </div>
        </div>
    
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="container shadow ">
                <!-- Card Header - Dropdown -->

                <div class="" >
                    <img class="card-img-top img-thumbnail" src="{{ $posts['p_image'] }}" alt="Card image" >
                    <div class="card-body">
                      <h4 class="card-title"> danh mục : {{ $posts['c_name'] }}</h4>
                      <p class="card-text"></p>
                     
                    </div>
                  </div>
                {{-- <figure>
                    <img src="{{ $posts['p_image'] }}" alt="" width="100px" class="rounded-circle">
                    <figcaption>
                     Danh mục:    {{ $posts['c_name'] }}
                    </figcaption>
                </figure> --}}
               
                <!-- Card Body -->
              
            </div>
        </div>
    </div>
@endsection
