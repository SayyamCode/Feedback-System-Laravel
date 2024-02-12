@extends('app')
@push('title')
    <title>Add Review</title>
@endpush

@section('main-content')
    <section class="account-form">

        <form action="{{ route('review-store') }}" method="post">
            @csrf
            <h3>post your review</h3>
            <p class="placeholder">review title <span>*</span></p>
            <input type="text" name="title" maxlength="50" placeholder="enter review title" class="box">
            @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
            <p class="placeholder">review description</p>
            <textarea name="description" class="box" placeholder="enter review description" maxlength="1000" cols="30"
                rows="10"></textarea>
            @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
            <p class="placeholder">review rating <span>*</span></p>
            <select name="rating" required class="box">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <input type="submit" value="submit review" class="btn">
            <a href="{{ route('dashboard') }}" class="option-btn">go back</a>
        </form>

    </section>
@endsection
