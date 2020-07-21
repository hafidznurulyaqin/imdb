<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal">{{ __('MAIN MENU') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug === 'actors') class="active " @endif>
                <a href="{{ route('actors.index') }}">
                    <i class="tim-icons icon-shape-star"></i>
                    <p>{{ __('Actors') }}</p>
                </a>
            </li>
            <li @if ($pageSlug === 'movies') class="active " @endif>
                <a href="{{ route('movies.index') }}">
                    <i class="tim-icons icon-tv-2"></i>
                    <p>{{ __('Movies') }}</p>
                </a>
            </li>
            <li @if ($pageSlug === 'producers') class="active " @endif>
                <a href="{{ route('producers.index') }}">
                    <i class="tim-icons icon-camera-18"></i>
                    <p>{{ __('Producers') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
