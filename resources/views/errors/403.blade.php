@extends('errors::minimal')

@section('title', $expection->getMessage())
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
