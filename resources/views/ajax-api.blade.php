<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX-API</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .m-t-10{
            margin:20px 100px;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="col-md-8 m-t-10">
    <div class="form-group">
        <select class="form-control" name="" id="division">
        <option value="">SELECT DIVISION</option>
        @foreach($division as $d)
        <option value="{{ $d->id }}">{{ $d->name }}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <select class="form-control" name="" id="district">
        <option value="">SELECT DISTRICT</option>
        <!-- <option value="">Chittagong</option>
        <option value="">Narayongonj</option>
        <option value="">Satkhira</option>
        <option value="">Satkania</option>    -->
        </select>
    </div>
    </div>

    <div class="col-md-8">
        <form id="submit_div_form" action="">
            <div class="form-group">
                <label for="">Enter Division</label>
                <input type="text" class="form-control" name="" id="div_name">

                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
    
    
    </div>
    <!-- Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
        $("#division").change(function(){
            var division = $("#division").val();
        $.ajax({
            url: "/getdistricts/"+division,
            dataType: 'json',
            success: function(res){

                var len_dis = res.district.length;
                for(i=0; i < len_dis; i++){
                    var str = '<option value="'+res.district[i].id+'">'+res.district[i].name+'</option>';
                    $("#district").append(str);
                }
	        }
            });
        });
</script>
<script>
            $("#submit_div_form").submit(function(e) {
                e.preventDefault(); 
                var name = $("#div_name").val();
                $.ajax({
                    type: "POST",
                    url: "/api/insert-division",
                    data : {
                        'division' : name,
                },
                    dataType : "json",
                    success: function(res)
                    {
                    console.log(res);
                    }
                });
            });


</script>
</script>
</script>
</body>
</html>