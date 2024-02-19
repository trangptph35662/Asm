@extends('layouts.master')

@section('title')
{{$category['name']}}
@endsection

@section('content')
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Truong</th>
                    <th>Du lieu</th>

                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Name: </td>
                    <td>{{ $category['name'] }}</td>
                </tr>
                <tr>
                    <td>Id: </td>
                    <td>{{ $category['id'] }}</td>
                </tr>
               
            </tbody>
        </table>
    </div>
</div>
@endsection