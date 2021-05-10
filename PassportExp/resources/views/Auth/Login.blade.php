@extends('Layout')

@section('content') 
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
    <br>
    <br>
    </div>
<form action="{{route('Auth.Login')}}" method="post">
    <!-- Login Form -->
    @csrf  
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="E-mail">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="Password">
      <input type="submit" class="fadeIn fourth" value="Log In">

</form>
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>


@endsection

@section('css') 
@endsection
@section('js') 
@endsection