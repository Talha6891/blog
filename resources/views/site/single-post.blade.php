<x-app-layout>

    @if($post->hasMedia('post'))
        <div class="site-cover site-cover-sm same-height overlay single-page"
             style="background-image: url('{{ $post->getFirstMediaUrl('post') }}'); height: 350px;">
            <div class="container">
                <div class="row same-height justify-content-center">
                    <div class="col-md-6">
                        <div class="post-entry text-center">
{{--                            <h1 class="mb-4">{{ $post->title }}</h1>--}}
                            <div class="post-meta align-items-center text-center">
                                <figure class="author-figure mb-0 me-3 mt-5 d-inline-block">
                                    <img src="{{ asset('assets/site/images/person_1.jpg') }}" alt="Image"
                                         class="img-fluid">
                                </figure>
                                <span class="d-inline-block mt-1">By Carl Atkinson</span>
                                <span>{{ $post->created_at->format('d F Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- paragrap text --}}
    <section class="section">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">
                    <h1 class="post-content-body text-black"><strong>{{ $post->title }}</strong></h1>

                    <div class="post-content-body text-black">
                        {!! $post->content !!}
                    </div>

                    <div class="pt-5 comment-wrap">
                        <h3 class="mb-5 heading">6 Comments</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard">
                                    <img src="{{ asset('assets/site/images/person_1.jpg') }}" alt="Image">
                                </div>
                                <div class="comment-body">
                                    <h3>Jean Doe</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                        necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim
                                        sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply rounded">Reply</a></p>
                                </div>
                            </li>
                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="#" class="p-5 bg-light">
                                <div class="form-group">
                                    <label for="message">{{ __('Comment') }}</label>
                                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

                <!-- END main-content -->

                {{-- sidebar start --}}
                <div class="col-md-12 col-lg-4 sidebar">
                    {{-- sidebar categories start --}}
                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="tags">
                            @if($post->category)
                                <li>
                                    <a href="#">{{ $post->category->name }} <span>{{ $post->category->count }}</span></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    {{-- sidebar categoreies end--}}

                    {{-- sidebar tags start--}}
                    <div class="sidebar-box">
                        <h3 class="heading">Tags</h3>
                        <ul class="tags">
                            @forelse($post->tags as $tag)
                            <li>
                                <a href="#">{{ $tag->name }}</a>
                            </li>
                            @empty
                            <p>{{ __('No Tag Available') }}</p>
                            @endforelse
                        </ul>
                    </div>
                    {{-- sidebar tags end --}}

                    {{-- sidebar popular start --}}
                    <div class="sidebar-box">
                        <h3 class="heading">Popular Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/site/images/img_1_sq.jpg') }}" alt="Image placeholder" class="me-4 rounded">
                                        <div class="text">
                                            <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">March 15, 2018 </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- sidebar popular end --}}
                </div>
                <!-- END sidebar -->
            </div>
        </div>
    </section>

</x-app-layout>
