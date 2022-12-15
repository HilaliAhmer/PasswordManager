@extends('errors::minimal')

@section('title', $expection->getMessage())
@section('code', '503')
@section('message', $expection->getMessage())
