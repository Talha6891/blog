<x-app-layout>
    {{-- Show posts with images --}}
    <section class="section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                @forelse($posts as $post)
                    <div class="col-md-4">
                        <a href="{{ route('post',$post->slug) }}" class="h-entry mb-30 v-height gradient border border-success">
                            <div class="featured-img"
                                 style="background-image: url('{{ $post->getFirstMediaUrl('post') }}');"></div>
                            <div class="text">
                                <span class="date">{{ $post->created_at->format('d F Y') }}</span>
                                <h2>{{ Str::limit($post->title,50) }}</h2>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h2>{{ __('No posts available') }}</h2>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    {{-- End show posts with images --}}

            <div class="pagination">
                {{ $posts->links('pagination') }}
            </div>
        </div>
    </section>
    {{-- End more recommended posts --}}

</x-app-layout>
