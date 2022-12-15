@extends('errors::minimal')

@section('title', $expection->getMessage())
@section('code', '404')
@section('message', $expection->getMessage())
