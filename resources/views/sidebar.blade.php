<div class="sidebar">
    <ul>
        <li class="{{request()->is('/') ? 'active' : ''}}"><a href="{{route('home')}}">{{__('Main Page')}}</a></li>
        <li><a href="#">{{__('Trending')}}</a></li>
        <li><a class="{{request()->is('subscriptions') ? 'active' : ''}}" href="{{route('user.subscriptions')}}">{{__('Subscriptions')}}</a></li>
        <li><a href="#">{{__('History')}}</a></li>
    </ul>
</div>