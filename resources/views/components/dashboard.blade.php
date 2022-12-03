@extends('base')

@section('content')
<div class='container-fluid'>
    <x-nav-bar :authUserName="$authUserName"/>
    <x-books-list />
</div>
