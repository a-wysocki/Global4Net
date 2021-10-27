<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zadanie Global4Net</title>
  
        <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Email</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Avatar</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $key => $user)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$user->email}}</td>
                      <td>{{$user->first_name}}</td>
                      <td>{{$user->last_name}}</td>
                      <td><img src="{{$user->avatar}}" class="img-fluid" alt="{{$user->first_name}} {{$user->last_name}}" /></td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        
        <script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap/bootstrap.min.js') }}"></script>
    </body>
</html>
