@extends('web._layouts.main')

@section('content')
    <main class="flex-fill d-flex align-items-center justify-content-center">
        <div class="container py-5">
            {{-- section 1 --}}
            <h1 class="display-4 fw-bold mb-3">{{ $aboutSections->get('heading')->title ?? 'About Us' }}</h1>
            @if ($aboutSections->get('heading')->content ?? false)
                <div>{!! $aboutSections->get('heading')->content !!}</div>
            @endif
            {{-- section 2 --}}
            <div class="lead mb-4">
                @if ($aboutSections->get('tagline')->title ?? false)
                    <h2>{{ $aboutSections->get('tagline')->title }}</h2>
                @endif
                {!! $aboutSections->get('tagline')->content ?? 'Manage, organize, and publish articles with ease.' !!}
            </div>
            <div class="d-flex flex-column justify-content-center gap-4 text-start">
                {{-- section 3 --}}
                <div>
                    @if ($aboutSections->get('team_intro')->title ?? false)
                        <h2>{{ $aboutSections->get('team_intro')->title }}</h2>
                    @endif
                    {!! $aboutSections->get('team_intro')->content ?? 'We are a team of passionate developers dedicated to creating amazing web applications with Laravel.' !!}
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-6 d-flex justify-content-center">
                        <img src="{{ 'assets/images/diorama.png' }}" class="w-100" alt="About Image">
                    </div>
                </div>
                {{-- section 4 --}}
                <div>
                    @if ($aboutSections->get('story')->title ?? false)
                        <h2>{{ $aboutSections->get('story')->title }}</h2>
                    @endif
                    {!! $aboutSections->get('story')->content ?? 'TheArticle is a platform dedicated to sharing knowledge, exploring ideas, and bringing meaningful stories to readers. We believe that every article has the power to inform, inspire, and spark conversations. Our goal is to make discovering and sharing valuable content a simple and enjoyable experience. Whether you are looking for fresh perspectives, informative reads, or interesting topics, TheArticle brings stories together in one place.' !!}
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 d-flex justify-content-center">
                        <img src="{{ asset('assets/images/background 1.jpg') }}" class="w-100" alt="About Image">
                    </div>
                </div>
                {{-- section 5 --}}
                <div>
                    <h2>{{ $aboutSections->get('mission')->title ?? 'Our Mission' }}</h2>
                    {!! $aboutSections->get('mission')->content ?? 'We aim to create a space where information is accessible, ideas are celebrated, and stories can reach the people who need them. Through thoughtful content and a seamless reading experience, we strive to make every visit worthwhile.' !!}
                </div>
            </div>
        </div>
    </main>
@endsection

@section('page-styles')
    <style>
        h1,
        p {
            text-align: justify;
        }

        .lead {
            color: blue;
        }
    </style>
@endsection
