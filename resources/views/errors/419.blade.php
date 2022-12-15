@extends('errors::minimal')

@section('title', $expection->getMessage())
@section('code', '419')
@section('message', $expection->getMessage())
