@extends('app')
@push('title')
    <title>Dashboard</title>
@endpush

@section('main-content')
    <section class="view-post">

        <div class="heading">
            <h1>Feedback details</h1>

            <a href="https://github.com/SayyamCode" style="margin-top: 0;"><i class='bx bxl-github bx-flashing bx-lg'
                    style="color: black"></i></a>
        </div>


        @if (session('success'))
            <div class="heading">
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif


        @if (session('destroy'))
            <div class="heading">
                <div class="alert-danger">
                    {{ session('destroy') }}
                </div>
            </div>
        @endif


        <div class="row">
            <div class="col">
                <img src="{{ asset('assets/images/post.webp') }}" alt="" class="image">
                <h3 class="title">IKONIC Software House</h3>
            </div>
            <div class="col">
                <div class="flex">
                    <div class="total-reviews">
                        <h3> {{ number_format($overallRating, 1) }} <i class="fas fa-star"></i></h3>
                        <p>{{ $totalReviews }} reviews</p>
                    </div>
                    <div class="total-ratings">
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>{{ $ratingsCount[5] }}</span>
                        </p>
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>{{ $ratingsCount[4] }}</span>
                        </p>
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>{{ $ratingsCount[3] }}</span>
                        </p>
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>{{ $ratingsCount[2] }}</span>
                        </p>
                        <p>
                            <i class="fas fa-star"></i>
                            <span>{{ $ratingsCount[1] }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>



    </section>

    <!-- view posts section ends -->



    <section class="reviews-container">

        <div class="heading">
            <h1>user's reviews</h1> <a href="{{ route('add.review') }}" class="inline-btn" style="margin-top: 0;">add
                review</a>
        </div>

        <div class="box-container">

            @foreach ($reviews as $review)
                <div class="box">

                    <div class="user">

                        <img src="" alt="">

                        <div>
                            <p> {{ $review->user->name }} </p>
                            <span>{{ $review->created_at->format('Y-m-d') }}</span>
                        </div>
                    </div>

                    <div class="ratings">
                        @if ($review->rating == 1)
                            <p style="background:var(--red);"><i class="fas fa-star"></i>
                                <span>{{ $review->rating }}</span>
                            </p>
                        @elseif ($review->rating == 2)
                            <p style="background:var(--red);"><i class="fas fa-star"></i>
                                <span>{{ $review->rating }}</span>
                            </p>
                        @elseif ($review->rating == 3)
                            <p style="background:var(--orange);"><i class="fas fa-star"></i>
                                <span>{{ $review->rating }}</span>
                            </p>
                        @else
                            <p style="background:var(--main-color);"><i class="fas fa-star"></i>
                                <span>{{ $review->rating }}</span>
                            </p>
                        @endif

                    </div>
                    <h3 class="title">{{ $review->title }}</h3>

                    <p class="description">{{ $review->description }}</p>


                    <div class="flex-btn">

                        @if ($review->user_id == auth()->user()->id)
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                {{-- <a href="" class="inline-option-btn">edit review</a> --}}
                                <button class="inline-delete-btn " type="submit">Delete Review</button>
                            </form>
                        @endif
                    </div>

                </div>
            @endforeach
        </div>
    </section>
@endsection
