
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

<h1>Edit {{ $employee->name }}</h1>

<!-- if there are creation errors, they will show here -->
{!! Html::ul($errors->all()) !!}

{!! Form::model($employee, array('route' => array('employees.update', $employee->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
    </div>

      
     <div class="form-group">
        {!! Form::label('salary', 'Salary') !!}
        {!! Form::text('salary', null, array('class' => 'form-control')) !!}
    </div>

   <div class="form-group">
        {!! Form::label('department', 'Department') !!}
        {!! Form::text('department', null, array('class' => 'form-control')) !!}
    </div>

   <div class="form-group">
        {!! Form::label('dob', 'DOB') !!}
        {!! Form::text('dob', null, array('class' => 'form-control')) !!}
    </div>


    {!! Form::submit('Edit the Employee!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
</body>
</html>