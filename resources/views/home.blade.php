@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard Panel') }}</div>
                    <form method="post" action="add/">
                        @csrf
                        <div class="form-group" style="margin-bottom: 1rem;margin-top: 1rem;padding-left: 1rem;padding-right: 1rem">
                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Name">
                        </div>
                        <div class="form-group" style="margin-bottom: 1rem;margin-top: 1rem;padding-left: 1rem;padding-right: 1rem">
                            <input type="text" class="form-control" name="salary" placeholder="Salary">
                        </div>
                        <div style="padding-left: 1rem">
                            <button  type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div style="color: red;padding-left: 1rem;padding-top: 10px">{{$error}}!</div>
                        @endforeach

                    @endif


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Staff Name</th>
                                <th scope="col">Staff Salary</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr">
                            <a hidden>{{$x = 1}}</a>
                            @foreach($post as $posts)
                                <th scope="row">{{$x ++}}</th>
                                <td>{{$posts->name}}</td>
                                <td style="text-align: left"> {{$posts->salary}} $<div style="float:right;clear:none"><a style="font-size: 10px" class="btn btn-success">Edit</a> <button style="font-size: 10px" class="btn btn-danger">Delete</button></div></td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
