@extends('layouts.app')

@section('script')

<div class="container pb-5">
        <div class="row justify-content-center d-flex">
            <div class="col-md-12">
                <div class="pink_card">
                    <h2 class="mb-3">Welcome to the Barbie Movies Forum</h2>
                    <p>Join the discussion, share your thoughts, and connect with fellow Barbie movie fans. <br>Whether you're a fan of the classics or the latest releases, this is the place to talk all things Barbie ~!</p>
                </div>
                <div class="card shadow-lg search">
                    <form action="" method="get"> 
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-11 col-md-11">
                                    <input type="text" value="{{ Request::get('keyword') }}" class="form-control form-control-lg" name="keyword" placeholder="Search by movie title">
                                </div>
                                <div class="col-lg-1 col-md-1">
                                    <button class="btn btn-primary btn-lg w-100"><i class="fa-solid fa-magnifying-glass"></i></button>                                                                    
                                </div>                                                                                 
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row mt-4">
                    @if($books->isNotEmpty())
                        @foreach($books as $book)
                            <div class="col-md-4 col-lg-3 mb-4">
                                <div class="card shadow-lg" style="border: 2px solid white; border-radius: 20px; overflow: hidden; color: #d5018e;">

                                    <a href="{{ route('book.detail', $book->id) }}">
                                    @if($book->image != '')
                                        <img src="{{ asset('uploads/books/thumb/'.$book->image) }}" alt="" class="card-img-top">
                                    @else
                                        <img src="https://placehold.co/990x1400?text = No Image" alt="" class="card-img-top">
                                    @endif
                                    </a>
                                    <div class="card-body">
                                        <h3 class="h4 heading"><a href="#">{{ $book->title }}</a></h3>
                                        <p>{{ $book->author }}</p>
                                        @php
                                        if($book->reviews_count > 0){
                                            $avgRating = $book->reviews_sum_rating/$book->reviews_count;
                                        }else{
                                            $avgRating = 0;
                                        }
                                        $avgRatingPer = ($avgRating*100)/5;
                                        @endphp
                                        <div class="star-rating d-inline-flex ml-2" title="">
                                            <span class="rating-text theme-font theme-yellow">{{ number_format($avgRating, 1) }}</span>
                                            <div class="star-rating d-inline-flex mx-2" title="">
                                                <div class="back-stars ">
                                                    <i class="fa fa-star " aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                
                                                    <div class="front-stars" style="width: {{ $avgRatingPer }}%">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <span class="theme-font text-muted">({{ ($book->reviews_count > 1) ? $book->reviews_count.' Reviews' : 'Review' }})</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    {{$books->links();}}
                    
                </div>
            </div>
        </div>
    </div>   
@endsection