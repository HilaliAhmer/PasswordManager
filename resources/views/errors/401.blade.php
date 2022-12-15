@extends('errors::minimal')

@section('title',$expection->getMessage())
@section('code', '401')
@section('message', $expection->getMessage())
