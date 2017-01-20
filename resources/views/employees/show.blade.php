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
        <li><a href="{{ URL::to('employees') }}">View All Employees</a></li>
        <li><a href="{{ URL::to('employees/create') }}">Create a Employee</a>
    </ul>
</nav>

<h1>Showing {{ $employee->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $employee->name }}</h2>
        <p>
            <strong>Salary:</strong> {{ $employee->salary }}<br>
            <strong>Department:</strong> {{ $employee->department }}<br>
            <strong>Dob:</strong> {{ $employee->dob }}<br>
        </p>
    </div>

</div>
</body>
</html>