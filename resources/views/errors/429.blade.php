@extends('errors::minimal')

@section('title', $expection->getMessage())
@section('code', '429')
@section('message', $expection->getMessage())
