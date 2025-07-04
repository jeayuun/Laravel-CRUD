@extends('layouts.app')

@section('content')

<div class="container mt-3">
        <div class="row justify-content-center d-flex mt-5">
            <div class="col-md-12">
                <a href="{{ route('home') }}" class="text-decoration-none text-dark ">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; <strong>Back to home</strong>
                </a>
                <div class="row mt-4 movie_card">
                    <div class="col-md-4">
                        @if($book->image != '')
                            <img src="{{ asset('uploads/books/thumb/'.$book->image) }}" class="card-img-top" style="border: 3px solid white; border-radius: 20px; overflow: hidden;" alt="">
                        @else
                            <img src="https://placehold.co/990x1400?text = No Image" alt="" style="border: 3px solid white; border-radius: 20px; overflow: hidden;" class="card-img-top">    
                        @endif
                </div>
                @php
                    if($book->reviews_count > 0){
                        $avgRating = $book->reviews_sum_rating/$book->reviews_count;
                    }else{
                        $avgRating = 0;
                    }
                    $avgRatingPer = ($avgRating*100)/5;
                @endphp
                    
                    <div class="col-md-8">
                        @include('layouts.message')
                        <h3 class="h2 mb-3">{{ $book->title }}</h3>
                        <div class="h4 text-muted">{{ $book->author }}</div>
                        <div class="star-rating d-inline-flex ml-2" title="">
                            <span class="rating-text theme-font theme-yellow">{{ number_format($avgRating,1) }}</span>
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
                            <!-- <span class="theme-font text-muted">({{ ($book->reviews_count > 1) ? $book->reviews_count.'Reviews' : 'Review' }})</span> -->
                            </div>

                        <div class="content mt-3">
                            <p>
                                 {{ $book->description }}    
                            </p>
                        </div>

                        <!-- <div class="col-md-12 pt-2">
                            <hr>
                        </div> -->
                        
                        <!-- <div class="row mt-4">
                            <div class="col-md-12">
                                <h2 class="h3 mb-4">More Barbie Movies</h2>
                            </div>
                            @if($relatedBooks->isNotEmpty())
                                @foreach($relatedBooks as $relatedBook)
                                <div class="col-md-4 col-lg-4 mb-4">
                                    <div class="card border-0 shadow-lg">
                                    <a href="{{ route('book.detail',$relatedBook->id) }}">
                                        @if($relatedBook->image != '')
                                            <img src="{{ asset('uploads/books/thumb/'.$relatedBook->image) }}" alt="" class="card-img-top">
                                        @else
                                        <img src="https://placehold.co/990x1400?text = No Image" alt="" class="card-img-top">    
                                        @endif
                                    </a>
                                    @php
                                        if($relatedBook->reviews_count > 0){
                                            $avgRating = $relatedBook->reviews_sum_rating/$relatedBook->reviews_count;
                                        }else{
                                            $avgRating = 0;
                                        }
                                        $avgRatingPer = ($avgRating*100)/5;
                                        @endphp
                                        
                                        <div class="card-body">
                                            <h3 class="h4 heading"><a href="{{ route('book.detail',$relatedBook->id) }}">
                                            {{ $relatedBook->title }}</a></h3>
                                            <p>{{ $relatedBook->author }}</p>
                                            <div class="star-rating d-inline-flex ml-2" title="">
                                                <span class="rating-text theme-font theme-yellow">{{ number_format($avgRating,1) }}</span>
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
                                                <span class="theme-font text-muted">({{ ($relatedBook->reviews_count > 1) ? $relatedBook->reviews_count.'Reviews' : 'Review' }})</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div> -->
                        <div class="col-md-12 pt-2">
                            <hr>
                        </div>
                        <div class="row pb-5">
                            <div class="col-md-12  mt-4">
                                <div class="d-flex justify-content-between">
                                    <h3>Share Your Thoughts!</h3>
                                    <div>
                                        @if(Auth::check())
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                           Write Post
                                        </button>
                                        @else
                                        <a href="{{ route('account.login') }}" class="btn btn-primary">Write Post</a>
                                        @endif 
                                          
                                    </div>
                                </div>                        
                                @if($book->reviews->isNotEmpty())
                                @foreach($book->reviews as $review)
                                    <div class="card border-0 shadow-lg my-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="mb-3">{{ $review->user->name }}</h4>
                                                <span class="text-muted">
                                                    {{ \Carbon\Carbon::parse($review->created_at)->format('d M, Y') }}
                                                </span>         
                                            </div>
                                            @php
                                                $ratingPer = ($review->rating/5)*100;
                                            @endphp
                                            <div class="mb-3">
                                                <div class="star-rating d-inline-flex" title="">
                                                    <div class="star-rating d-inline-flex " title="">
                                                        <div class="back-stars ">
                                                            <i class="fa fa-star " aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                        
                                                            <div class="front-stars" style="width: {{$ratingPer}}%">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                                                
                                            </div>
                                            <div class="content">
                                                <p>{{$review->review}}</p>
                                            </div>
                                        </div>
                                    </div>  
                                @endforeach
                                @else
                                <div>
                                    No posts found.
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>   
    
    <!-- Modal -->
    <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Post for <strong></strong></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="bookRreviewForm" name="bookRreviewForm">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Post</label>
                            <textarea name="review" id="review" class="form-control" cols="5" rows="5" placeholder="Post"></textarea>
                            <p class="invalid-feedback" id="review-error"></p>
                        </div>
                        <div class="mb-3">
                            <label for=""  class="form-label">Rating</label>
                            <select name="rating" id="rating" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $("#bookRreviewForm").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: '{{ route("book.saveReview") }}',
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}',
                },
                data:$("#bookRreviewForm").serializeArray(),
                success: function(response){
                    if(response.status == false){
                        var errors = response.errors;
                        if(errors.review){
                            $("#review").addClass('is-invalid');
                            $("#review-error").html(errors.review);
                        }else{
                            $("#review").removeClass('is-invalid');
                            $("#review-error").html('');
                        }
                    }else{
                        window.location.href='{{ route("book.detail",$book->id) }}';
                    }
                }
            });
        })

    </script>
@endsection