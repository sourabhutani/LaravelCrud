<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('employees/create') }}">Create a Employee</a>
    </ul>
</nav>

<h1>All the employees</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Salary</td>
            <td>Department</td>
            <td>Dob</td>
        </tr>
    </thead>
    <tbody>
    @foreach($employees as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->salary }}</td>
            <td>{{ $value->department }}</td>
            <td>{{ $value->dob }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {!! Form::open(array('url' => 'employees/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this Employee', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('employees/' . $value->id) }}">Show this Employee</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('employees/' . $value->id . '/edit') }}">Edit this Employee</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>