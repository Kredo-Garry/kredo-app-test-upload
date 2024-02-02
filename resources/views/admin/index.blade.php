@extends('layouts.app')
<style>
    .list-group-item {
        padding: 15px !important;
    }
</style>
@section('title', 'Admin Home')
@section('content')
    <div class="row">
        <div class="col-3 ">
            @include('admin.sidebar')
        </div>
        <div class="col-8">
            <form action="" method="post">
                <textarea name="news" class="form-control" id="" cols="30" rows="10" placeholder="Post a news"></textarea>
                <button type="submit" class="btn btn-lg btn-outline-primary px-5 mt-3">Post</button>
            </form>
            <div class="div p-5 mt-5 bg-light shadow">
                <p class="display-6 text-secondary">
                    Booked classes
                </p>
                <table class="table table-hover table-striped table-bordered">
                    <thead class="table-dark">
                        <th>
                            Teacher
                        </th>
                        <th>
                            Class subject
                        </th>
                        <th colspan="2">
                            Class details
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td> Lorem ipsum dolor sit amet.</td>
                            <td> Lorem ipsum dolor sit amet.</td>
                            <td> <a href="#" class="text-decoration-none">View details &nbsp; <i class="fas fa-eye"></i> </a> </td>
                        </tr>
                        <tr>
                            <td> Lorem ipsum dolor sit amet.</td>
                            <td> Lorem ipsum dolor sit amet.</td>
                            <td> <a href="#" class="text-decoration-none">View details &nbsp; <i class="fas fa-eye"></i> </a> </td>
                        </tr>
                        <tr>
                            <td> Lorem ipsum dolor sit amet.</td>
                            <td> Lorem ipsum dolor sit amet.</td>
                            <td> <a href="#" class="text-decoration-none">View details &nbsp; <i class="fas fa-eye"></i> </a> </td>
                        </tr>
                        <tr>
                            <td> Lorem ipsum dolor sit amet.</td>
                            <td> Lorem ipsum dolor sit amet.</td>
                            <td> <a href="#" class="text-decoration-none">View details &nbsp; <i class="fas fa-eye"></i> </a> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
