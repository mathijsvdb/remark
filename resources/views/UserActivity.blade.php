@extends("old-design.layouts.master")

@section("content")

    <div class="activity">

        <h2>Your user activity</h2>

        @if(count($result) > 0)
            <ul class="list-group">
                @foreach($result as $notification)

                    @if($notification->notificationType == 'like')

                        @if($notification->user_id == Auth::user()->id)
                            <li>You like {{ $notification->firstname }} {{ $notification->lastname }}'s project</li>
                        @else
                            <li>{{ $notification->firstname }} {{ $notification->lastname }} likes your project</li>
                        @endif

                    @elseif($notification->notificationType == 'favorite')

                        @if($notification->user_id == Auth::user()->id)
                            <li>You favorite {{ $notification->firstname }} {{ $notification->lastname }}'s project</li>
                        @else
                            <li>{{ $notification->firstname }} {{ $notification->lastname }} favorites your project</li>
                    @endif

                    @elseif($notification->notificationType == 'comment')

                        @if($notification->user_id == Auth::user()->id)
                            <li>You commented on {{ $notification->firstname }} {{ $notification->lastname }}'s project</li>
                        @else
                            <li>{{ $notification->firstname }} {{ $notification->lastname }} commented on your project</li>
                        @endif
                    @endif
                @endforeach
            </ul>
        @endif
    </div>
@stop