<!-- Styles -->
<style>
    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .table thead tr th:first-child {
        padding-left: 0.5em !important;
    }

    .table > thead > tr > th {
        padding: 0.8em 0.5em;
        font-size: 0.8em;
    }

    .table th, .table td {
        padding: 0.6rem;
        position: relative;
    }

    .table small {
        font-size: 0.4rem;
    }

</style>


<div class="row">
    @foreach($dates as $nameMoth => $moth)

        <div class="col-md-4">
            <div class="card border-0">
                <div class="card-body p-0">
                    <h6 class="card-title text-uppercase mb-1 text-black ml-1">{{ $nameMoth }}</h6>


                    <div class="table-responsive">
                        <table class="table table-sm text-center">
                            <thead class="b-t">
                            <tr class="text-uppercase">
                                @foreach($weeks as $week)
                                    <th class="">{{ $week }}</th>
                                @endforeach
                            </tr>
                            </thead>

                            <tbody class="font-weight-normal" style="font-weight: 400">
                            @foreach($moth as $key => $week)


                                <tr>
                                    @foreach($week as $key=> $day)

                                        @if ($loop->first)
                                            @php
                                                $dayOfWeek = reset($week)->dayOfWeekIso;
                                            @endphp
                                            @for($i = 1; $i < $dayOfWeek; $i++)
                                                <th></th>
                                            @endfor

                                        @endif

                                        <th @if($day->startOfDay()->eq($current->startOfDay())) class="bg-black-opacity text-white" @endif>

                                            <span class="d-block">{{$day->format('j')}}</span>
                                            @if(rand(0,1))
                                                <span class="pull-bottom" style="margin-left: auto;
margin-right: auto;
left: 0;
right: 0;">

                                                    @foreach(range(random_int(0,1),random_int(1,3)) as $key)
                                                        <small>
                                                            <i class="icon-circle {{ ['text-primary','text-danger','text-warning','text-info','text-black','text-success'][array_rand(['text-primary','text-danger','text-warning','text-info','text-black','text-success'])] }}"></i>
                                                        </small>
                                                    @endforeach
                                            </span>
                                            @endif
                                        </th>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
</div>

