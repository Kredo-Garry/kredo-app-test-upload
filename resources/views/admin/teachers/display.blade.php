@extends('layouts.app')

@section('title', 'Manage teachers')

@section('content')
    <div class="container">

    </div>
    <a href="{{ url()->previous() }}" class="display-4">
        <i class="fas fa-arrow-left "></i>
    </a>
    <div class="row justify-content-center mt-5">

        <div class="col-8 shadow bg-white p-5">
            <p class="text-secondary display-6">Teacher List</p>

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <td></td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>

                    </td>

                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>
                                @if ($teacher->avatar)
                                    <img src="{{ asset('/storage/teacher/avatar/' . $teacher->avatar) }}" alt=""
                                        class="rounded-circle avatar-md">
                                @else
                                    <i class="fa-solid fa-circle-user icon-md"></i>
                                @endif
                            </td>
                            <td>
                                {{ $teacher->name }}
                            </td>
                            <td>
                                {{ $teacher->email }}
                            </td>
                            <td class="text-center">
                                @if ($teacher->trashed())
                                    <form action="{{ route('admin.restore.teacher', $teacher->id) }}" method="post">
                                        @method('PATCH')
                                        @csrf

                                        <button type="submit" class="btn text-success shadow-none">Activate</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.delete.teacher', $teacher->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn text-danger shadow-none">Deactivate</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection
