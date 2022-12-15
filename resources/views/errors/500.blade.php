@extends('errors::minimal')

@section('title', $expection->getMessage())
@section('code', '500')
@section('message', $expection->getMessage())
