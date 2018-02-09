@extends('layouts.master')

    @section('content')

        <div class="col-md-8 blog-main">
            <h1>{{ $post->title }}</h1>


                @if (count($post->tags))

                    <ul>

                            @foreach($post->tags as $tag)
                            <li>

                                <a href="/posts/tags/{{ $tag->name }}">
                                    {{ $tag->name }}
                                </a>

                            </li>

                            @endforeach

                    </ul>


                @endif

            {{ $post->body }}

            <hr>

            <div class="comments">

                <ul class="list-group">



                @foreach($post->comments as $comment)

                   <li class="list-group-item">

                       <strong>

                           {{ $comment->created_at->diffForHumans() }} : &nbsp;

                       </strong>

                        {{ $comment->body }}

                   </li>

                    @endforeach

                </ul>

            </div>
{{-- Add a comment --}}
            <hr>

            <div class="card">
                <div class="card-block">
                    <form method="POST" action="/posts/{{ $post->id }}/comments">
                         {{-- Investigar {{ method_field('PATCH') }} --}}

                        {{ csrf_field() }}



                        <div class="from-group">
                            <textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>
                        </div>

                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </div>
                    </form>

                        @include ('layouts.errors')

                </div>
            </div>

        </div>

    @endsection