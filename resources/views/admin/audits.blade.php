@extends('layouts.app')
@section('title', 'Subjects - TeckQuiz')
@section('content')
<br>

<div class="container">
    <h1 class="mt-5">Subjects</h1>
    <div class="row">
        <div class="col-9">
<ul>
    @forelse ($audits as $audit)
    <li>
        @lang('article.updated.metadata', $audit->getMetadata())

        @foreach ($audit->getModified() as $attribute => $modified)
        <ul>
            <li>@lang('POST.'.$audit->event.'.modified.'.$attribute, $modified)</li>
        </ul>
        @endforeach
    </li>
    @empty
    <p>@lang('article.unavailable_audits')</p>
    @endforelse
</ul>

@endsection