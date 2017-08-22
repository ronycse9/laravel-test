<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> {{ Config::get("lab_config.site_name") }} | Home</title>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="{{url('public/js/jquery.js')}}"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md text-center">
                    <h1>{{myName()}}</h1>
                </div>

                {{Form::open(['url'=>'/save','method'=>'post','files'=>'true'])}}
                <div class="container">
                  <div class="col-md-6">

                    <div class="form-group">
                         <label>Name</label>
                         <input type="text" class="form-control" required name="name">
                     </div>

                     <div class="form-group">
                          <label>Mobile</label>
                          <input type="text" class="form-control" required name="mobile">
                      </div>

                   <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required name="email">
                    </div>

                     <div class="form-group">
                         <label>Address</label>
                         <textarea required name="address" rows="5" cols="75"></textarea>
                     </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            {{Form::close()}}
            <br>

              <div class="container">
                <!--pre>{{-- dd($data) --}}</pre>
                <pre>{{--print_r($data->toArray())--}}</pre>
                <pre>{{--print_r($data->tojson())--}}</pre-->

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Address</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $value)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->mobile}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{$value->address}}</td>
                       </tr>
                      @endforeach
                  </tbody>
                </table>

                {{$data->render()}}
                {{--$data->links()--}}

            




         <span id="msg"></span>
         <hr>
            <button type="button" name="button" id="show">Show</button>
          </div>
          </div>
        <script type="text/javascript">
          $(document).ready(function(){
            var url = "http://" + window.location.hostname + "/mySite/";

              $('#show').on("click",function(){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });

                  var obj = {
                    table : "students",
                    cond : { email : "bjayanta@gmail.com"}
                  };

                  $.ajax({
                     type :'POST',
                     url  : url + 'getmsg',
                     data : "where=" + JSON.stringify(obj)
                   }).done(function(response){
                     $("#msg").text(response.msg);
                     console.log(response);
                   });
               });
          });
        </script>
    </body>
</html>
