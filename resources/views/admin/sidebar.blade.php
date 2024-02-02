<div class="row ">
    <div class="col-3 w-100">
        <ul class="list-group rounded-0">
            <li class="list-group-item text-light bg-dark">
                Create &nbsp; <i class="fa fa-user-plus " aria-hidden="true"></i>
            </li>
           <a href="{{ route('admin.students.create') }}" class="list-group-item">Register a student</a>
           <a href="{{ route('admin.teachers.create') }}" class="list-group-item">Register a Teacher</a>
           <li class="list-group-item text-light bg-primary">
                Manage &nbsp; <i class="fas fa-book    "></i>
            </li>
           <a href="{{ route('admin.students.index') }}" class="list-group-item">Manage students</a>
           <a href="{{ route('admin.teachers.index') }}" class="list-group-item">Manage teachers</a>
        </ul>
    </div>
</div>
