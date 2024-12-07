<!doctype html>
<html lang="en">
@include('dashboard.partials.head')

<body class="vertical light ltr">
    <div class="wrapper">

        @include('dashboard.partials.header')

        @include('dashboard.partials.sidebar')

        <main role="main" class="main-content">
            <div class="container-fluid">
                @yield('content')
            </div>

            {{-- Notification Modal --}}
            <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog"
                aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="notificationBody">
                            @if(count(Auth::guard('admin')->user()->notifications) > 0)
                                <div class="list-group list-group-flush my-n3">
                                    @foreach(Auth::guard('admin')->user()->notifications as $notification)
                                        <div class="list-group-item {{$notification->unread() ? 'bg-light' : 'bg-transparent'}}">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-box fe-24"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>{{$notification->data['message']}}</strong></small>
                                                    <div class="my-0 text-muted small">{{$notification->data['name']}} <br> {{$notification->data['email']}}</div>
                                                    <small class="badge badge-pill badge-light text-muted">{{$notification->created_at->diffForHumans()}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div> <!-- / .list-group -->
                            @else
                                nothing
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div> <!-- .wrapper -->

    @include('dashboard.partials.scripts')
    @yield('scripts')
</body>

</html>
