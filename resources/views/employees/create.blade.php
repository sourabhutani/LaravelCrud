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
    </ul>
</nav>

<h1>Create a Employee</h1>

<!-- if there are creation errors, they will show here -->
{!! Html::ul($errors->all()) !!}

{!! Form::open(array('url' => 'employees')) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
    </div>

   <div class="form-group">
        {!! Form::label('salary', 'Salary') !!}
        {!! Form::text('salary', Input::old('salary'), array('class' => 'form-control')) !!}
    </div>

   <div class="form-group">
        {!! Form::label('department', 'Department') !!}
        {!! Form::text('department', Input::old('department'), array('class' => 'form-control')) !!}
    </div>

   <div class="form-group">
        {!! Form::label('dob', 'DOB') !!}
        {!! Form::text('dob', date("Y-m-d H:i:s"), array('class' => 'form-control')) !!}
    </div>


    {!! Form::submit('Create the Employee!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
</body>
</html>