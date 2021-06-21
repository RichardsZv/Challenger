@extends('layouts.app')
@section('content')
<!DOCTYPE html>    
<html>  
    <head>    
        <title>Track Activity</title>         
    </head> 
<body>

    @isset($units)
            @foreach ( $units as $unit )
                <h1>{{ $unit->unitName }}</h1>
            @endforeach
        @endisset
        

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-info mb-3">
                    <div class="card-header text-center"><h2>Track Activity</h2></div>
                    
                        <div class="card-body">
                            <div class="form text-center">
                                <form method="POST" action="{{ action([App\Http\Controllers\TrackActivityController::class, 'store']) }}"> @csrf
                                    {{-- 
                                        SPORTSNAME TABULA
                                        
                                    --}}
                                    <br><br>
                                    <label for="StartTime">Start Time</label>
                                    <input type="datetime-local" name="StartTime" id="StartTime">
                                    <br><br><br>
                                    <label for="Duration">Duration(seconds):</label>
                                    <input type="number" name="Duration" id="Duration"><br>
                                    <br><br>
                                    <button type="button" class="btn btn-dark" onclick="add()">Add Units</button>
                                    <br><br>

                                    <div id="uniti"> 
                                    
                                    </div>
                                    <br>

                                    <input type="submit" class="btn btn-dark" value="Submit">
                                    <br><br>

                                </form>
                    
                            </div>
                        </div>
                </div>   
            </div>
        </div>
</div>
    
</body>

<script type='text/javascript'>
    
    function add() {
        inputs = document.getElementById("uniti");
        var unit = document.createElement("SELECT");
        unit.setAttribute("placeholder", "Unit");
        unit.setAttribute("id", "Unit1");


        var units = {!! json_encode($units->toArray()) !!};
        var length = units.length;
        var i = 0;
        

        units.forEach(function (oneUnit) {
            var xx = oneUnit.unitName;
            option = document.createElement("option");
            option.text = xx;
            option.value = xx;
            unit.appendChild(option);
        });

        var y = document.createElement("INPUT");
        y.setAttribute("type", "text");
        y.setAttribute("placeholder", "Goal value");
        y.setAttribute("id", "Measurement1");


        inputs.appendChild(document.createElement("br"));
        inputs.appendChild(y);
        inputs.appendChild(unit);
        inputs.appendChild(document.createElement("br"));
    }
</script>
</html>
@endsection
