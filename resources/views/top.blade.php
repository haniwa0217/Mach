@extends('layouts.layout')

@section('content')
<div class="loginPage">
  <div class="container">
    <div class="loginPage_contents">
    <h1 class="h3 loginPage_contents_title" >新しいマッチを見つけよう</h1>
    <div class="btn-square-toy"><a class="text-white" href="{{ route('login') }}">メールアドレスでログインする</a></div>
    <div class="account loginPage_contents_account"><a class="text-white" href="{{ route('register') }}">アカウント作成はこちら</a> 
    </div>
    
  </div>
  </div>
</div>
@endsection