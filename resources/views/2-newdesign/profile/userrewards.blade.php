<div class="container-fluid">
    @if(count($badges) > 0)
        <ul class="list-unstyled text-center" id="rewards">
            @foreach($badges as $badge)
                <li>
                    @if(in_array($badge->id, $userbadge_ids))
                        <img class="reward rewarded" src="/assets/images/badges/{{ $badge->badge_img }}" alt="{{ $badge->badge_title }}">
                    @else
                        <img class="reward" src="/assets/images/badges/{{ $badge->badge_img }}" alt="{{ $badge->badge_title }}}">
                    @endif

                    <p><strong>{{ $badge->badge_title }}</strong></p>
                    <p>{{ $badge->badge_description }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>