<div class="sidebar">
    <ul>
        <li class="{{request()->is('/') ? 'active' : ''}}"><a href="{{route('home')}}">{{__('Главная страница')}}</a></li>
        <li class="{{request()->is('popular') ? 'active' : ''}}"><a href="{{route('popular')}}">{{__('Популярные видеоролики')}}</a></li>
        <li class="{{request()->is('*/subscriptions*') ? 'active' : ''}}"><a href="{{route('user.subscriptions')}}">{{__('Подписки')}}</a></li>
    </ul>
    <hr style="border-color: #444; margin-bottom: 0;">
    <ul class="users">
        <h5 style="font-size: 14px; padding-left: 10px; padding-bottom: 10px; font-weight: 700;">Популярные пользователи</h5>
        @foreach(\App\User::topUsers() as $user)
        <li>
            <img class="d-flex mr-3 rounded-circle"
                 src="{{ env('APP_URL') . '/storage/avatars/' . $user->avatar }}"
                 alt="Avatar {{$user->name}}">
            <h6 class="mt-0"><a href="{!! route('user.profile', ['id' => $user->id]) !!}">{!! $user->name !!}</a></h6>
        </li>
        @endforeach
    </ul>
</div>