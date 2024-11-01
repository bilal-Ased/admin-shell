<style>
    .form-wrapper {
        padding: 20px;
        /* Add spacing inside the form */
    }

    .form-group {
        margin-bottom: 15px;
        /* Space between form groups */
    }
</style>
<x-app-layout :assets="$assets ?? []">
    <div class="row">

        @include('tickets.includes.ticket_scripts')
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="profile-img position-relative me-3 mb-3 mb-lg-0">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($ticket->customer->first_name) }}&background=0D8ABC&color=fff"
                                    alt="User-Profile"
                                    class="theme-color-default-img img-fluid rounded-pill avatar-100">
                                <img src="{{asset('images/avatars/avtar_1.png')}}" alt="User-Profile"
                                    class="theme-color-purple-img img-fluid rounded-pill avatar-100">
                                <img src="{{asset('images/avatars/avtar_2.png')}}" alt="User-Profile"
                                    class="theme-color-blue-img img-fluid rounded-pill avatar-100">
                                <img src="{{asset('images/avatars/avtar_4.png')}}" alt="User-Profile"
                                    class="theme-color-green-img img-fluid rounded-pill avatar-100">
                                <img src="{{asset('images/avatars/avtar_5.png')}}" alt="User-Profile"
                                    class="theme-color-yellow-img img-fluid rounded-pill avatar-100">
                                <img src="{{asset('images/avatars/avtar_3.png')}}" alt="User-Profile"
                                    class="theme-color-pink-img img-fluid rounded-pill avatar-100">
                            </div>
                            <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                                <h4 class="me-2 h4">{{ $ticket->customer->first_name }}</h4>
                                <span class="text-capitalize"> {{ $ticket->customer->phone_number }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        {{-- <h4 class="card-title">Create Ticket</h4> --}}
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="cardTitle"></h5><strong>Ticket ID:</strong> {{$ticket->id}}
                    <p class="cardText"><strong>Issue Source:</strong> {{$ticket->ticketSources->name}}</p>
                    <p class="cardText"><strong>Category:</strong>{{$ticket->ticketCategories->name}}</p>
                    <p class="cardText"><strong>Status:</strong>{{$ticket->status->name}}</p>
                    <p class="cardText"><strong>Disposition:</strong>{{$ticket->ticketDisposition->name}}</p>
                    <p class="cardText"><strong>Department:</strong>{{$ticket->ticketDepartment->name ?? 'None'}}</p>
                    <p class="cardText"><strong>Creator:</strong>{{$ticket->creator->username}}</p>
                    <p class="cardText"><strong>Assigned To:</strong>{{$ticket->user->username}}</p>
                    <p class="cardText" id="customerCreated"><strong>Created At:</strong>{{$ticket->created_at}}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="profile-content tab-content">
                <div id="profile-feed" class="tab-pane fade active show">

                    <div class="card">
                        <div class="form-wrapper">
                            <form method="post" id="ticketForm" action="{{ route('update.ticket', $ticket->id) }}">
                                <div class="form-group">
                                    @include('tickets.includes.assigned_and_status')
                                </div>
                                <div class="form-group">
                                    <label for="customFile" class="form-label custom-file-input">Attach File</label>
                                    <input class="form-control" type="file" id="customFile" name="file_path">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="exampleFormControlTextarea1">Comments</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
                                        name="comments"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>
                <div id="profile-activity" class="tab-pane fade">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Activity</h4>
                            </div>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <div class="header-title">
                        <h4 class="card-title">Activity</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                        <ul class="list-inline p-0 m-0">
                            <li>
                                <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                                <h6 class="float-left mb-1">Ticket Created</h6>
                                <small class="float-right mt-1">{{$ticket->created_at->format('d F Y')}}</small>

                            </li>
                            <li>
                                <div class="timeline-dots timeline-dot1 border-success text-success"></div>
                                <h6 class="float-left mb-1">Status Changed</h6>
                                <small class="float-right mt-1">23 November 2019</small>
                                <div class="d-inline-block w-100">
                                    <p>Changed to closed </p>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-dots timeline-dot1 border-danger text-danger"></div>
                                <h6 class="float-left mb-1">Comment Added</h6>
                                <small class="float-right mt-1">20 November 2019</small>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">
            </div>
        </div>
    </div>
    <script>
        jQuery(($) => {

            var ticket = @json($ticket);
            var user = ticket.user
            selectAssignedUser(user)

            var status = ticket.status
            selectTicketStatus(status)
        })

    </script>

    {{-- @include('partials.components.share-offcanvas') --}}



</x-app-layout>