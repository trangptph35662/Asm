@extends('layouts.master')


@section('title')
{{$user['name']}}
@endsection
@section('content')
    <div class="container">
        <h1>Chi tiết : {{ $user['name'] }}</h1>

       
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
                            <td>{{ $user['id'] }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $user['name'] }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user['email'] }}</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>{{ $user['password'] }}</td>
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
                    <img class="card-img-top img-thumbnail" src="{{ $user['avatar'] }}" alt="Card image" >
                    <div class="card-body">
                      <h4 class="card-title"> {{ $user['name'] }}</h4>
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
